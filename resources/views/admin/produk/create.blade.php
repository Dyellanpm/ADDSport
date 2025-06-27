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

    <!-- Nama -->
    <div>
      <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Produk</label>
      <input type="text" name="nama" id="nama" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <!-- Kategori -->
    <div>
      <label for="kategori_id" class="block text-sm font-medium text-gray-700 mb-1">Kategori</label>
      <select name="kategori_id" id="kategori_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
        <option value="">-- Pilih Kategori --</option>
        @foreach ($kategoris as $kategori)
          <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
        @endforeach
      </select>
    </div>

    <!-- Deskripsi -->
    <div>
      <label for="deskripsi" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi Produk</label>
      <textarea name="deskripsi" id="deskripsi" rows="4" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: Sepatu running ringan dan empuk..."></textarea>
    </div>

    <!-- Ukuran -->
    <div>
      <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran Tersedia</label>
      <input type="text" name="size" id="size" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" placeholder="Contoh: 39, 40, 41, 42">
    </div>

    <!-- Harga -->
    <div>
      <label for="harga" class="block text-sm font-medium text-gray-700 mb-1">Harga</label>
      <input type="number" name="harga" id="harga" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <!-- Stok -->
    <div>
      <label for="stok" class="block text-sm font-medium text-gray-700 mb-1">Stok</label>
      <input type="number" name="stok" id="stok" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-indigo-500 focus:border-indigo-500" required>
    </div>

    <!-- Gambar -->
    <div>
      <label for="gambar" class="block text-sm font-medium text-gray-700 mb-1">Gambar</label>
      <input type="file" name="gambar" id="gambar" class="w-full text-sm border-gray-300 rounded-lg shadow-sm" required>
    </div>

    <!-- Tombol -->
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
