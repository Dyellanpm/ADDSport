@extends('layouts.admin')

@section('title', 'Dashboard Admin')

@section('content')
  <!-- Cards -->
  <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-10 mt-10">
    <div class="rounded-2xl shadow-lg p-6 text-white bg-gradient-to-br from-indigo-500 to-indigo-700">
      <h2 class="text-lg font-semibold">Total Produk</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalProduk }}</p>
    </div>
    <div class="rounded-2xl shadow-lg p-6 text-white bg-gradient-to-br from-emerald-500 to-emerald-700">
      <h2 class="text-lg font-semibold">Total Pesanan</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalPesanan }}</p>
    </div>
    <div class="rounded-2xl shadow-lg p-6 text-white bg-gradient-to-br from-rose-500 to-rose-700">
      <h2 class="text-lg font-semibold">Total Pengguna</h2>
      <p class="text-3xl font-bold mt-2">{{ $totalPengguna }}</p>
    </div>
  </div>

  <!-- Statistik Penjualan Bulanan -->
  <div class="bg-white rounded-2xl shadow-md p-6 border border-gray-200">
    <h3 class="text-xl font-semibold text-indigo-700 mb-4">Statistik Penjualan Bulanan</h3>
    <table class="w-full table-auto text-left border-collapse">
      <thead>
        <tr class="border-b border-gray-300">
          <th class="px-4 py-2">Bulan</th>
          <th class="px-4 py-2">Jumlah Penjualan</th>
        </tr>
      </thead>
      <tbody>
        @foreach($salesByMonth as $bulan => $jumlah)
          <tr class="border-b border-gray-200 hover:bg-gray-50">
            <td class="px-4 py-2 capitalize">{{ $bulan }}</td>
            <td class="px-4 py-2 font-semibold">{{ $jumlah }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
