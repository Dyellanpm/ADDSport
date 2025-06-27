@extends('layouts.pembeli')

@section('title', 'Beranda Pembeli')

@section('content')
<section class="gradient-bg text-white py-16 text-center">
    <h1 class="text-4xl font-bold mb-2">Selamat Datang di <span class="text-yellow-300">ADDsports</span></h1>
    <p class="mb-6">Temukan perlengkapan olahraga premium dengan kualitas terbaik dan harga bersahabat</p>
    <button class="bg-white text-indigo-600 px-8 py-3 rounded-2xl font-semibold">Mulai Belanja</button>
</section>

<section class="py-8 bg-white/50">
    <div class="max-w-7xl mx-auto px-6">
        <h2 class="text-2xl font-bold text-center mb-6 text-gray-800">Kategori Populer</h2>
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-4">
            <div class="category-chip text-white p-4 rounded-2xl text-center">Sepak Bola</div>
            <div class="bg-gradient-to-r from-green-400 to-blue-500 text-white p-4 rounded-2xl text-center">Basket</div>
            <div class="bg-gradient-to-r from-purple-400 to-pink-500 text-white p-4 rounded-2xl text-center">Lari</div>
            <div class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white p-4 rounded-2xl text-center">Renang</div>
            <div class="bg-gradient-to-r from-teal-400 to-cyan-500 text-white p-4 rounded-2xl text-center">Fitness</div>
            <div class="bg-gradient-to-r from-indigo-400 to-purple-500 text-white p-4 rounded-2xl text-center">Voli</div>
        </div>
    </div>
</section>

<main class="max-w-7xl mx-auto px-6 py-8">
    <h2 class="text-2xl font-bold text-gray-800 mb-4">Produk Terbaru</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        {{-- produk-produk --}}
        <div class="bg-white rounded-2xl shadow card-hover p-4">
            <img src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?w=400&h=300&fit=crop" class="w-full h-40 object-cover rounded-xl mb-3">
            <span class="category-chip text-white px-3 py-1 rounded-full text-xs">Sepatu Lari</span>
            <h3 class="font-bold mt-2 mb-1">Sepatu Lari Premium Nike Air Max</h3>
            <span class="price-tag text-white px-4 py-2 rounded-xl font-bold text-lg">Rp 1.299.000</span>
            <a href="{{ route('pembeli.section') }}" class="block mt-4 bg-indigo-600 text-white py-2 rounded-xl text-center">DETAIL PRODUK</a>
        </div>

        {{-- produk 2 & 3 --}}
        {{-- ... --}}
    </div>
</main>
@endsection
