<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pesanan;


class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('items.produk')->latest()->get();
        return view('admin.pesanan', compact('pesanans'));
    }

    public function updateStatus(Request $request, $id)
    {
        $pesanan = Pesanan::findOrFail($id);
        $pesanan->status = $request->status;
        $pesanan->save();

        return redirect()->back()->with('success', 'Status pesanan berhasil diperbarui.');
    }

}
