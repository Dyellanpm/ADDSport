@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
<div class="container mx-auto px-4 py-8">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Manajemen Produk</h2>
    <a href="{{ route('products.create') }}"
       class="inline-flex items-center px-4 py-2 bg-indigo-600 hover:bg-indigo-700 text-white text-sm font-medium rounded-md shadow">
      <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
      </svg>
      Tambah
    </a>
  </div>

  <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto">
    <table class="min-w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100 text-xs uppercase text-gray-600">
        <tr>
          <th class="px-4 py-3">No</th>
          <th class="px-4 py-3">Gambar</th>
          <th class="px-4 py-3">Produk</th>
          <th class="px-4 py-3">Kategori</th>
          <th class="px-4 py-3">Harga</th>
          <th class="px-4 py-3">Stok</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($products as $index => $product)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">{{ $index + 1 }}</td>

            <!-- Gambar -->
            <td class="px-4 py-3">
              @if ($product->gambar)
                <img src="{{ asset('storage/' . $product->gambar) }}" alt="Gambar"
                     class="w-14 h-14 object-cover rounded shadow border">
              @else
                <div class="w-14 h-14 flex items-center justify-center bg-gray-100 border rounded">
                  <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                  </svg>
                </div>
              @endif
            </td>

            <!-- Nama -->
            <td class="px-4 py-3">
              <div class="font-semibold">{{ $product->nama }}</div>
              <div class="text-xs text-gray-500">ID: {{ $product->id }}</div>
            </td>

            <td class="px-4 py-3">{{ $product->kategori }}</td>
            <td class="px-4 py-3">Rp{{ number_format($product->harga, 0, ',', '.') }}</td>
            <td class="px-4 py-3">{{ $product->stok > 0 ? $product->stok . ' pcs' : 'Habis' }}</td>

            <!-- Aksi -->
            <td class="px-6 py-4 text-center">
              <div class="flex justify-center space-x-2">
                <!-- Edit -->
                <a href="{{ route('products.edit', $product) }}"
                   class="w-9 h-9 flex items-center justify-center rounded-lg bg-yellow-500 hover:bg-yellow-600 text-white shadow transition">
                  <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                  </svg>
                </a>

                <!-- Delete -->
                <form action="{{ route('products.destroy', $product) }}" method="POST"
                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">
                  @csrf @method('DELETE')
                  <button type="submit"
                          class="w-9 h-9 flex items-center justify-center rounded-lg bg-red-500 hover:bg-red-600 text-white shadow transition">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                  </button>
                </form>
              </div>
            </td>
          </tr>
        @empty
          <tr>
            <td colspan="7" class="text-center py-6 text-gray-500">Belum ada produk tersedia.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
