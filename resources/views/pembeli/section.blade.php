@extends('layouts.pembeli')

@section('title', 'Detail Produk')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">
    <!-- Bagian Detail Produk -->
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Gambar Produk -->
        <div>
            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=700&h=500&fit=crop" alt="Sepatu Lari" class="rounded-2xl shadow-xl w-full object-cover">
        </div>

        <!-- Informasi Produk -->
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Sepatu Lari Premium Nike Air Max</h1>
            <span class="inline-block bg-indigo-100 text-indigo-600 text-sm px-3 py-1 rounded-full mb-4">Kategori: Lari</span>

            <p class="text-gray-600 mb-4 leading-relaxed">
                Didesain untuk kenyamanan maksimal dengan teknologi Air Max terbaru. Cocok digunakan untuk aktivitas olahraga maupun sehari-hari.
            </p>

            <div class="text-2xl font-extrabold text-indigo-700 mb-6">Rp 1.299.000</div>

            <div class="mb-6">
                <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Pilih Ukuran</label>
                <select id="size" name="size" class="w-full border border-gray-300 rounded-xl p-2">
                    <option value="">-- Pilih Ukuran --</option>
                    <option>39</option>
                    <option>40</option>
                    <option>41</option>
                    <option>42</option>
                    <option>43</option>
                </select>
            </div>
        </div>
    </div>

    <!-- Form Checkout -->
    <div id="checkout-form" class="mt-16 bg-white shadow-xl rounded-2xl p-8">
        <h2 class="text-2xl font-bold text-gray-800 mb-6">Formulir Pembelian</h2>
        <form>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                    <input type="text" id="nama" class="w-full border border-gray-300 rounded-xl p-3" placeholder="Masukkan nama Anda">
                </div>
                <div>
                    <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
                    <input type="text" id="no_hp" class="w-full border border-gray-300 rounded-xl p-3" placeholder="08XXXXXXXXXX">
                </div>
            </div>

            <div class="mb-6">
                <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman</label>
                <textarea id="alamat" rows="4" class="w-full border border-gray-300 rounded-xl p-3" placeholder="Masukkan alamat lengkap"></textarea>
            </div>

            <a href="{{ route('pembeli.checkout') }}" class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-3 rounded-xl">
    Checkout Sekarang
</a>

    </div>
</div>
@endsection
