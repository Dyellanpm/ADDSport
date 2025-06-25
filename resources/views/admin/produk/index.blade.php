@extends('layouts.admin')

@section('content')
  <div class="flex justify-between items-center mb-6 mt-10">
    <h2 class="text-2xl font-semibold text-gray-800">Manajemen Produk</h2>
    <a href="{{ route('products.create') }}" class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md text-sm font-medium shadow-sm">
      + Tambah Produk
    </a>
  </div>

  <div class="overflow-x-auto bg-white border border-gray-200 rounded-lg shadow-sm">
    <table class="min-w-full text-sm text-gray-700">
      <thead class="bg-gray-100 text-gray-600 uppercase tracking-wider text-xs">
        <tr>
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Gambar</th>
          <th class="px-4 py-3">Nama</th>
          <th class="px-4 py-3">Kategori</th>
          <th class="px-4 py-3">Harga</th>
          <th class="px-4 py-3">Stok</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100 bg-white">
        @foreach ($products as $index => $product)
        <tr class="hover:bg-gray-50">
          <td class="px-4 py-3">{{ $index + 1 }}</td>
          <td class="px-4 py-3">
            @if ($product->gambar)
              <img src="{{ asset('storage/' . $product->gambar) }}" alt="Gambar Produk" class="w-12 h-12 object-cover rounded">
            @else
              <span class="italic text-gray-400">-</span>
            @endif
          </td>
          <td class="px-4 py-3 font-medium">{{ $product->nama }}</td>
          <td class="px-4 py-3">{{ $product->kategori }}</td>
          <td class="px-4 py-3">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
          <td class="px-4 py-3">{{ $product->stok }}</td>
          <td class="px-4 py-3 text-center space-x-1">
            <a href="{{ route('products.edit', $product) }}" class="inline-block bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs font-medium">
              Edit
            </a>
            <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
              @csrf @method('DELETE')
              <button type="submit" class="inline-block bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs font-medium">
                Hapus
              </button>
            </form>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
