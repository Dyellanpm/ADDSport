@extends('layouts.pembeli')

@section('title', 'Kategori: ' . ucfirst($kategori->nama))

@section('content')
<section class="py-16 text-center bg-gradient-to-r from-indigo-700 via-purple-700 to-pink-600 text-white shadow-inner">
    <h1 class="text-4xl font-extrabold tracking-tight mb-2">
        Kategori: {{ ucfirst($kategori->nama) }}
    </h1>
    <p class="text-lg text-white/90">Temukan pilihan produk terbaik dalam kategori ini</p>
</section>

<main class="max-w-7xl mx-auto px-4 md:px-8 py-16">
    @if ($products->isEmpty())
        <div class="text-center text-gray-500 text-lg">
            <p>Belum ada produk dalam kategori ini.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($products as $product)
                <div class="relative group bg-white rounded-2xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">

                    {{-- Label Baru --}}
                    @if($product->created_at->gt(now()->subDays(7)))
                        <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-2 py-1 rounded-full z-10 shadow-sm">
                            Baru
                        </span>
                    @endif

                    {{-- Gambar --}}
                    <div class="bg-gray-100 h-56 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('storage/' . $product->gambar) }}"
                             alt="{{ $product->nama }}"
                             class="h-full w-auto object-contain transition-transform duration-300 group-hover:scale-105">
                    </div>

                    {{-- Konten --}}
                    <div class="p-5">
                        {{-- Kategori --}}
                        <p class="text-xs text-white bg-indigo-500 inline-block px-3 py-1 rounded-full mb-2">
                            {{ $kategori->nama }}
                        </p>

                        {{-- Nama --}}
                        <h3 class="text-lg font-semibold text-gray-800 group-hover:text-indigo-600 transition">
                            {{ $product->nama }}
                        </h3>

                        {{-- Harga --}}
                        <div class="mt-2 text-xl font-bold text-orange-500">
                            Rp {{ number_format($product->harga, 0, ',', '.') }}
                        </div>

                        {{-- Tombol --}}
                        <a href="{{ route('pembeli.detail', $product->id) }}"
                           class="mt-4 block w-full bg-indigo-600 hover:bg-indigo-700 text-white text-center py-2 rounded-lg font-semibold transition">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</main>
@endsection
