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

        $items = $user->keranjang()->with('produk')->get();

        if ($items->isEmpty()) {
            return back()->with('error', 'Keranjang Anda kosong.');
        }

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

            foreach ($items as $item) {
                if ($item->produk->stok < $item->qty) {
                    throw new \Exception("Stok untuk {$item->produk->nama} tidak mencukupi.");
                }

                // Tambahkan item ke pesanan
                PesananItem::create([
                    'pesanan_id' => $pesanan->id,
                    'produk_id' => $item->produk_id,
                    'qty' => $item->qty,
                    'size' => $item->size,
                ]);

                // Kurangi stok produk
                $item->produk->decrement('stok', $item->qty);
            }

            // Kosongkan keranjang
            $user->keranjang()->delete();

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
