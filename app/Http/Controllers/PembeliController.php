<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Pesanan;
use App\Models\Keranjang;
use App\Models\PesananItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PembeliController extends Controller
{
    public function berandaPembeli()
    {
        $products = Product::latest()->take(6)->get();
        $riwayat = Pesanan::with('items.produk')
            ->where('user_id', auth()->id())
            ->latest()
            ->take(4)
            ->get();

        return view('pembeli.pembeli', compact('products', 'riwayat'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('pembeli.section', compact('product'));
    }

    public function checkout(Request $request)
    {
        $user = auth()->user();

        // Validasi umum
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'no_hp' => 'required|string|max:20',
            'alamat' => 'required|string',
            'metode_pembayaran' => 'required|string',
        ]);

        DB::beginTransaction();

        try {
            // Buat pesanan baru
            $pesanan = new Pesanan();
            $pesanan->user_id = $user->id;
            $pesanan->nama = $validated['nama'];
            $pesanan->no_hp = $validated['no_hp'];
            $pesanan->alamat = $validated['alamat'];
            $pesanan->metode_pembayaran = $validated['metode_pembayaran'];
            $pesanan->status = 'Diproses';
            $pesanan->save();

            // ==== CASE 1: Checkout banyak produk (dari form-checkout) ====
            if (is_array($request->produk_id)) {
                $produk_ids = $request->produk_id;
                $qtys = $request->qty;
                $sizes = $request->size;

                foreach ($produk_ids as $i => $produk_id) {
                    $produk = Product::findOrFail($produk_id);
                    $qty = $qtys[$i];
                    $size = $sizes[$i];

                    if ($produk->stok < $qty) {
                        throw new \Exception("Stok untuk {$produk->nama} tidak mencukupi.");
                    }

                    PesananItem::create([
                        'pesanan_id' => $pesanan->id,
                        'produk_id' => $produk_id,
                        'qty' => $qty,
                        'size' => $size,
                    ]);

                    $produk->decrement('stok', $qty);
                }

                // Kosongkan keranjang
                $user->keranjang()->delete();
            }

            // ==== CASE 2: Checkout 1 produk (dari halaman detail) ====
            elseif ($request->filled('produk_id')) {
                $request->validate([
                    'produk_id' => 'required|exists:products,id',
                    'qty' => 'required|integer|min:1',
                    'size' => 'required|string|max:10',
                ]);

                $produk = Product::findOrFail($request->produk_id);

                if ($produk->stok < $request->qty) {
                    throw new \Exception("Stok untuk {$produk->nama} tidak mencukupi.");
                }

                PesananItem::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $produk->id,
                    'qty' => $request->qty,
                    'size' => $request->size,
                ]);

                $produk->decrement('stok', $request->qty);
            }

            // ==== CASE 3: Tidak valid ====
            else {
                throw new \Exception('Data checkout tidak lengkap.');
            }

            DB::commit();
            return redirect()->route('pembeli.saya')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Checkout gagal: ' . $e->getMessage());
        }
    }


    public function saya()
    {
        $pesanans = Pesanan::with('items.produk')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('pembeli.pesanan-saya', compact('pesanans'));
    }

    public function selesai()
    {
        return view('pembeli.pesanan-selesai');
    }

    public function selesaikanPesanan($id)
    {
        $pesanan = Pesanan::where('id', $id)->where('user_id', auth()->id())->firstOrFail();

        if ($pesanan->status !== 'Dikirim') {
            return back()->with('error', 'Pesanan belum bisa diselesaikan.');
        }

        $pesanan->status = 'Selesai';
        $pesanan->save();

        return back()->with('success', 'Pesanan telah ditandai selesai. Terima kasih!');
    }

    public function formCheckout()
    {
        $items = Keranjang::with('produk')->where('user_id', auth()->id())->get();

        if ($items->isEmpty()) {
            return redirect()->route('pembeli.keranjang.index')->with('error', 'Keranjang kosong.');
        }

        return view('pembeli.form-checkout', compact('items'));
    }

}
