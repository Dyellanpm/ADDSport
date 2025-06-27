@extends('layouts.admin')

@section('title', 'Manajemen Pesanan')

@section('content')
<div class="container mx-auto px-4 py-8">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Manajemen Pesanan</h2>
  </div>

  @if(session('success'))
    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
      {{ session('success') }}
    </div>
  @endif

  <div class="bg-white border border-gray-200 rounded-lg overflow-x-auto">
    <table class="min-w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100 text-xs uppercase text-gray-600">
        <tr>
          <th class="px-4 py-3">ID</th>
          <th class="px-4 py-3">Nama</th>
          <th class="px-4 py-3">Produk</th>
          <th class="px-4 py-3">Jumlah</th>
          <th class="px-4 py-3">Status</th>
          <th class="px-4 py-3">Tanggal</th>
          <th class="px-4 py-3 text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($pesanans as $pesanan)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">ORD{{ str_pad($pesanan->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td class="px-4 py-3">{{ $pesanan->nama }}</td>
            <td class="px-4 py-3">
              <ul class="list-disc list-inside space-y-1">
                @foreach ($pesanan->items as $item)
                  <li>{{ $item->produk->nama }} (x{{ $item->qty }})</li>
                @endforeach
              </ul>
            </td>
            <td class="px-4 py-3">{{ $pesanan->items->sum('qty') }}</td>
            <td class="px-4 py-3">
              <span class="inline-block px-2 py-1 text-xs rounded
                @if($pesanan->status == 'Dikirim') bg-green-100 text-green-700
                @elseif($pesanan->status == 'Dibatalkan') bg-red-100 text-red-700
                @else bg-yellow-100 text-yellow-700 @endif">
                {{ $pesanan->status }}
              </span>
            </td>
            <td class="px-4 py-3">{{ $pesanan->created_at->format('d M Y') }}</td>
            <td class="px-4 py-3 text-center">
              <div class="flex justify-center space-x-2">
                <button onclick="showModal({{ $pesanan->id }}, 'Dikirim')"
                  class="px-3 py-1 bg-green-600 hover:bg-green-700 text-white text-xs rounded shadow">
                  Kirim
                </button>
                <button onclick="showModal({{ $pesanan->id }}, 'Dibatalkan')"
                  class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white text-xs rounded shadow">
                  Batal
                </button>
              </div>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

{{-- Modal --}}
<div id="confirmModal" class="fixed inset-0 bg-black bg-opacity-50 hidden items-center justify-center z-50">
  <div class="bg-white rounded-xl p-6 w-full max-w-md shadow-xl">
    <h3 class="text-lg font-semibold text-gray-800 mb-4">Konfirmasi Perubahan Status</h3>
    <p class="text-sm text-gray-600 mb-6">Apakah Anda yakin ingin mengubah status pesanan ini?</p>
    <form id="statusForm" method="POST">
      @csrf
      @method('PUT')
      <input type="hidden" name="status" id="modalStatus">
      <div class="flex justify-end gap-3">
        <button type="button" onclick="closeModal()" class="text-gray-600 hover:text-gray-800">Batal</button>
        <button type="submit" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded">
          Ya, Lanjutkan
        </button>
      </div>
    </form>
  </div>
</div>

{{-- Script --}}
<script>
  function showModal(id, status) {
    const form = document.getElementById('statusForm');
    form.action = `/admin/pesanan/${id}/status`;
    document.getElementById('modalStatus').value = status;
    document.getElementById('confirmModal').classList.remove('hidden');
    document.getElementById('confirmModal').classList.add('flex');
  }

  function closeModal() {
    document.getElementById('confirmModal').classList.add('hidden');
    document.getElementById('confirmModal').classList.remove('flex');
  }
</script>
@endsection
