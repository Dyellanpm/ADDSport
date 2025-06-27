@extends('layouts.admin')

@section('title', 'Manajemen Pengguna')

@section('content')
<div class="container mx-auto px-4 py-6 mt-8">
  <div class="flex justify-between items-center mb-6">
    <h2 class="text-2xl font-bold text-gray-800">Daftar Pengguna</h2>
  </div>

  @if(session('success'))
    <div class="mb-6 rounded-lg bg-green-100 text-green-800 px-4 py-3 text-sm shadow">
      {{ session('success') }}
    </div>
  @endif

  <div class="overflow-x-auto bg-white rounded-lg shadow border border-gray-200">
    <table class="min-w-full divide-y divide-gray-200 text-sm">
      <thead class="bg-gray-100 text-xs uppercase text-gray-600">
        <tr class="border-b">
          <th class="px-4 py-3 text-left font-semibold">ID</th>
          <th class="px-4 py-3 text-left font-semibold">Nama</th>
          <th class="px-4 py-3 text-left font-semibold">Email</th>
          <th class="px-4 py-3 text-left font-semibold">Role</th>
          {{-- Kolom aksi dihapus --}}
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-100">
        @forelse ($users as $user)
          <tr class="border-b hover:bg-gray-50">
            <td class="px-4 py-3">USR{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
            <td class="px-4 py-3">{{ $user->name }}</td>
            <td class="px-4 py-3">{{ $user->email }}</td>
            <td class="px-4 py-3 capitalize">{{ $user->role }}</td>
          </tr>
        @empty
          <tr>
            <td colspan="4" class="px-4 py-3 text-center text-gray-500">Belum ada pengguna terdaftar.</td>
          </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</div>
@endsection
