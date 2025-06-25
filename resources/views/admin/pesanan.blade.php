@extends('layouts.admin')

@section('title', 'Manajemen Pesanan')

@section('content')
  <div class="mb-4 mt-10 flex justify-between items-center">
    <h2 class="text-xl font-bold text-[#483AA0]">Daftar Pesanan</h2>
  </div>

 <div class="mb-4 flex justify-between items-center">
    <a
        href="#"
        class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded text-sm">
        + Tambah Pesanan
    </a>
</div>

  <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
      <thead class="bg-[#483AA0] text-white">
        <tr>
          <th class="px-6 py-3 text-left font-semibold">ID</th>
          <th class="px-6 py-3 text-left font-semibold">Nama Pelanggan</th>
          <th class="px-6 py-3 text-left font-semibold">Produk</th>
          <th class="px-6 py-3 text-left font-semibold">Jumlah</th>
          <th class="px-6 py-3 text-left font-semibold">Status</th>
          <th class="px-6 py-3 text-left font-semibold">Tanggal</th>
          <th class="px-6 py-3 text-left font-semibold">Aksi</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @foreach ([1, 2, 3] as $id)
          <tr>
            <td class="px-6 py-4">ORD00{{ $id }}</td>
            <td class="px-6 py-4">Pelanggan {{ $id }}</td>
            <td class="px-6 py-4">Produk {{ $id }}</td>
            <td class="px-6 py-4">{{ rand(1, 5) }}</td>
            <td class="px-6 py-4">
              <span class="inline-block px-2 py-1 text-xs rounded bg-green-100 text-green-700">
                {{ $id % 2 === 0 ? 'Dikirim' : 'Diproses' }}
              </span>
            </td>
            <td class="px-6 py-4">{{ now()->subDays($id)->format('d M Y') }}</td>
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
