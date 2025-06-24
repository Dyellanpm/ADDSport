@extends('layouts.admin')

@section('title', 'Manajemen Produk')

@section('content')
  <div class="mb-4 flex justify-between items-center">
    <h2 class="text-xl font-bold text-[#483AA0]">Daftar Produk</h2>
  </div>

  <div class="mb-4 flex justify-between items-center">
    <a
        href="#"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">
        + Tambah Produk
    </a>
</div>

  <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
      <thead class="bg-[#483AA0] text-white">
        <tr>
          <th class="px-6 py-3 text-left font-semibold">ID</th>
          <th class="px-6 py-3 text-left font-semibold">Nama Produk</th>
          <th class="px-6 py-3 text-left font-semibold">Kategori</th>
          <th class="px-6 py-3 text-left font-semibold">Harga</th>
          <th class="px-6 py-3 text-left font-semibold">Stok</th>
          <th class="px-6 py-3 text-left font-semibold">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @foreach ([1,2,3] as $id)
          <tr>
            <td class="px-6 py-4">PRD00{{ $id }}</td>
            <td class="px-6 py-4">Sepatu {{ $id }}</td>
            <td class="px-6 py-4">Running</td>
            <td class="px-6 py-4">Rp{{ number_format(300000 + $id * 100000, 0, ',', '.') }}</td>
            <td class="px-6 py-4">{{ rand(5, 20) }}</td>
            <td class="px-6 py-4 space-x-2">
              <a href="#" class="bg-yellow-400 hover:bg-yellow-500 text-white px-3 py-1 rounded text-xs">Edit</a>
              <form action="#" method="POST" class="inline">
                @csrf
                @method('DELETE')
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs">
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
