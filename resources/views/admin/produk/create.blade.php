@extends('layouts.admin')

@section('title', 'Tambah Produk')

@section('content')
<div class="container mx-auto px-4 py-8 max-w-3xl">
  <div class="mb-6">
    <h2 class="text-3xl font-bold text-gray-900">Tambah Produk Baru</h2>
    <p class="text-gray-600 mt-1">Isi form berikut untuk menambahkan produk ke sistem</p>
  </div>

  <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data" class="bg-white p-6 rounded-xl shadow-sm border border-gray-100 space-y-6">
    @csrf

    <div>
      <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
      <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <div>
      <label for="kategori" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
      <input type="text" name="kategori" id="kategori" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <div>
      <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
      <input type="number" name="harga" id="harga" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <div>
      <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
      <input type="number" name="stok" id="stok" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <div>
      <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar (opsional)</label>
      <input type="file" name="gambar" id="gambar" class="w-full text-sm border-gray-300 rounded-lg shadow-sm">
    </div>

    <div class="flex justify-end gap-3 pt-4">
      <button type="button" onclick="window.location='{{ route('products.index') }}'"
              class="bg-gray-100 hover:bg-gray-200 text-gray-700 font-medium px-5 py-2 rounded-lg transition">
        Kembali
      </button>
      <button type="submit"
              class="bg-indigo-600 hover:bg-indigo-700 text-white font-semibold px-6 py-2 rounded-lg shadow-sm transition">
        Simpan
      </button>
    </div>
  </form>
</div>
@endsection
