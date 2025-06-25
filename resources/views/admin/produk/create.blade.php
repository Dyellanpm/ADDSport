@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
  <h2 class="text-xl font-bold text-indigo-700 mb-4">Tambah Produk Baru</h2>

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
    @csrf
    <div>
      <label class="block">Nama Produk</label>
      <input type="text" name="nama" class="border w-full p-2 rounded" required>
    </div>
    <div>
      <label class="block">Kategori</label>
      <input type="text" name="kategori" class="border w-full p-2 rounded" required>
    </div>
    <div>
      <label class="block">Harga</label>
      <input type="number" name="harga" class="border w-full p-2 rounded" required>
    </div>
    <div>
      <label class="block">Stok</label>
      <input type="number" name="stok" class="border w-full p-2 rounded" required>
    </div>
    <div>
      <label class="block">Gambar (opsional)</label>
      <input type="file" name="gambar" class="border w-full p-2 rounded">
    </div>
    <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded">Simpan</button>
    <a href="{{ route('products.index') }}" class="text-sm text-gray-600 ml-4">← Kembali</a>
  </form>
@endsection
