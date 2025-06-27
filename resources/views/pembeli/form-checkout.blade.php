@extends('layouts.pembeli')

@section('title', 'Checkout')

@section('content')
<div class="max-w-4xl mx-auto px-4 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-6 text-center">🧾 Informasi Checkout</h2>

    @if(session('error'))
        <div class="mb-4 bg-red-100 text-red-800 p-4 rounded shadow text-center">
            {{ session('error') }}
        </div>
    @endif

    <form action="{{ route('pembeli.checkout') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <input type="text" name="nama" value="{{ auth()->user()->name }}" required class="w-full px-4 py-2 border rounded-xl" />
            </div>
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">No HP</label>
                <input type="text" name="no_hp" value="{{ auth()->user()->no_hp }}" required class="w-full px-4 py-2 border rounded-xl" />
            </div>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman</label>
            <textarea name="alamat" required rows="3" class="w-full px-4 py-2 border rounded-xl">{{ auth()->user()->alamat }}</textarea>
        </div>

        <div class="mt-6">
            <label class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
            <select name="metode_pembayaran" required class="w-full px-4 py-2 border rounded-xl">
    <option value="">-- Pilih Metode Pembayaran --</option>
    <option value="transfer_bank">Transfer Bank</option>
    <option value="ewallet">E-Wallet (OVO, Dana, Gopay)</option>
    <option value="cod">Bayar di Tempat (COD)</option>
    <option value="qris">QRIS</option>
</select>

        </div>

        @foreach($items as $item)
            <input type="hidden" name="produk_id[]" value="{{ $item->produk->id }}">
            <input type="hidden" name="qty[]" value="{{ $item->qty }}">
            <input type="hidden" name="size[]" value="{{ $item->size }}">
        @endforeach

        <div class="mt-10 text-center">
            <button type="submit"
                    class="bg-green-600 hover:bg-green-700 text-white font-bold px-6 py-3 rounded-xl shadow transition">
                🚀 Proses Checkout
            </button>
        </div>
    </form>
</div>
@endsection
