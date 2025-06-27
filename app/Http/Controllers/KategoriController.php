<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    // Menampilkan semua kategori (jika perlu)
    public function index()
    {
        $kategoris = Kategori::all();
        return view('pembeli.kategori-index', compact('kategoris'));
    }

    // Menampilkan produk berdasarkan nama kategori (misal: kategori/futsal)
    public function showBySlug($slug)
    {
        $kategori = Kategori::where('slug', $slug)->firstOrFail();
        $products = $kategori->products()->latest()->paginate(10);

        return view('pembeli.kategori.detail', compact('kategori', 'products'));
    }

}
