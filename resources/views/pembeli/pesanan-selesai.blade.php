@extends('layouts.pembeli')

@section('title', 'Pesanan Selesai')

@section('content')
<div class="max-w-3xl mx-auto px-4 py-12 text-center">
    <h1 class="text-3xl font-bold text-green-600 mb-4">Terima kasih!</h1>
    <p class="text-gray-700 mb-6">Pesananmu berhasil dibuat. Kami akan segera memprosesnya.</p>
    <a href="{{ route('pembeli.dashboard') }}" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl">KEMBALI BELANJA</a>
</div>
@endsection
