<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Kategori;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Tampilkan semua produk
    public function index()
    {
        $products = Product::with('kategori')->get();
        return view('admin.produk.index', compact('products'));
    }

    // Detail produk pembeli
    public function show($id)
    {
        $product = Product::with('kategori')->findOrFail($id);
        return view('pembeli.section', compact('product')); // ✅ nama view final: pembeli.section
    }

    // Landing page tampilkan 6 produk terbaru
    public function landing()
    {
        $products = Product::with('kategori')->latest()->take(6)->get();
        return view('welcome', compact('products'));
    }

    // Form tambah produk
    public function create()
    {
        $kategoris = Kategori::all();
        return view('admin.produk.create', compact('kategoris'));
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'nullable|string',
            'size' => 'nullable|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'required|image|max:2048',
        ]);

        $validated['gambar'] = $request->file('gambar')->store('products', 'public');
        Product::create($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil ditambahkan');
    }

    // Form edit produk
    public function edit(Product $product)
    {
        $kategoris = Kategori::all();
        return view('admin.produk.edit', compact('product', 'kategoris'));
    }

    // Update produk
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'nama' => 'required|string',
            'kategori_id' => 'required|exists:kategori,id',
            'deskripsi' => 'nullable|string',
            'size' => 'nullable|string',
            'harga' => 'required|integer',
            'stok' => 'required|integer',
            'gambar' => 'nullable|image|max:2048',
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('products', 'public');
        }

        $product->update($validated);

        return redirect()->route('products.index')->with('success', 'Produk berhasil diperbarui');
    }

    // Hapus produk
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Produk berhasil dihapus');
    }
}
