@extends('layouts.pembeli')

@section('title', 'Pesanan Saya')

@section('content')
<div class="max-w-5xl mx-auto px-4 py-10">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Pesanan Saya</h2>

    <div class="space-y-6">
        <!-- Pesanan 1 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-2">
                <div>
                    <h3 class="font-semibold text-indigo-700">Pesanan #001</h3>
                    <p class="text-sm text-gray-500">Tanggal: 27 Juni 2025</p>
                </div>
                <div>
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-700">
                        Selesai
                    </span>
                </div>
            </div>
            <div class="text-sm text-gray-600 mb-4">
                Total: <strong>Rp 1.299.000</strong>
            </div>
            <a href="{{ route('pembeli.selesai') }}" class="text-indigo-600 hover:underline text-sm font-medium">
                Lihat Detail
            </a>
        </div>

        <!-- Pesanan 2 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-2">
                <div>
                    <h3 class="font-semibold text-indigo-700">Pesanan #002</h3>
                    <p class="text-sm text-gray-500">Tanggal: 25 Juni 2025</p>
                </div>
                <div>
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">
                        Diproses
                    </span>
                </div>
            </div>
            <div class="text-sm text-gray-600 mb-4">
                Total: <strong>Rp 899.000</strong>
            </div>
            <a href="#" class="text-indigo-600 hover:underline text-sm font-medium">
                Lihat Detail
            </a>
        </div>

        <!-- Pesanan 3 -->
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-lg transition">
            <div class="flex justify-between items-center mb-2">
                <div>
                    <h3 class="font-semibold text-indigo-700">Pesanan #003</h3>
                    <p class="text-sm text-gray-500">Tanggal: 20 Juni 2025</p>
                </div>
                <div>
                    <span class="inline-block px-3 py-1 rounded-full text-sm font-medium bg-yellow-100 text-yellow-700">
                        Diproses
                    </span>
                </div>
            </div>
            <div class="text-sm text-gray-600 mb-4">
                Total: <strong>Rp 499.000</strong>
            </div>
            <a href="#" class="text-indigo-600 hover:underline text-sm font-medium">
                Lihat Detail
            </a>
        </div>
    </div>
</div>
@endsection
