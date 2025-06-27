<?php

namespace App\Http\Controllers;

use App\Models\Keranjang;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KeranjangController extends Controller
{
    public function index()
    {
        $items = Keranjang::with('produk.kategori')
            ->where('user_id', Auth::id())
            ->latest()
            ->get();

        return view('pembeli.keranjang', compact('items'));
    }

    public function tambah(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:products,id',
            'size' => 'nullable|string',
            'qty' => 'required|integer|min:1'
        ]);

        Keranjang::create([
            'produk_id' => $request->produk_id,
            'user_id' => Auth::id(),
            'size' => $request->size,
            'qty' => $request->qty,
        ]);

        return redirect()->back()->with('success', 'Produk ditambahkan ke keranjang');
    }

    public function tambahQty($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->qty += 1;
        $item->save();

        return back()->with('success', 'Jumlah produk berhasil ditambahkan.');
    }


    public function kurangi($id)
    {
        $item = Keranjang::findOrFail($id);
        if ($item->qty > 1) {
            $item->decrement('qty');
        } else {
            $item->delete(); // hapus kalau qty jadi 0
        }
        return back()->with('success', 'Jumlah dikurangi');
    }


    public function hapus($id)
    {
        $item = Keranjang::where('id', $id)->where('user_id', Auth::id())->firstOrFail();
        $item->delete();

        return redirect()->back()->with('success', 'Produk dihapus dari keranjang');
    }
}
