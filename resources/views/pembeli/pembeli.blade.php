@extends('layouts.pembeli')

@section('title', 'Beranda Pembeli')

@section('content')

{{-- ✅ Hero Section --}}
<section class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-500 text-white py-16 text-center">
    <h1 class="text-4xl md:text-5xl font-bold mb-4">
        Selamat Datang di <span class="text-yellow-300">ADDsports</span>
    </h1>
    <p class="mb-6 text-sm md:text-base">Temukan perlengkapan olahraga premium dengan kualitas terbaik dan harga bersahabat</p>
    <a href="#produk-terbaru">
        <button class="bg-white text-indigo-600 px-8 py-3 rounded-2xl font-semibold hover:bg-gray-100 transition">
            Mulai Belanja
        </button>
    </a>
</section>

{{-- ✅ Carousel Otomatis --}}
<section class="bg-white py-6">
    <div class="max-w-6xl mx-auto px-4" x-data="{
        current: 0,
        images: ['/images/demo.png', '/images/(1).png'],
        interval: null,
        start() {
            this.interval = setInterval(() => {
                this.current = (this.current + 1) % this.images.length;
            }, 4000);
        },
        stop() {
            clearInterval(this.interval);
        }
    }" x-init="start()" @mouseover="stop()" @mouseleave="start()">
        <div class="relative overflow-hidden rounded-2xl shadow-lg">
            <template x-for="(image, index) in images" :key="index">
                <div x-show="current === index" class="transition duration-500">
                    <img :src="image" class="w-full h-64 md:h-[400px] object-cover object-center">
                </div>
            </template>
        </div>
        <div class="flex justify-center mt-4 gap-2">
            <template x-for="(image, index) in images" :key="index">
                <button @click="current = index"
                        :class="{'bg-indigo-600': current === index, 'bg-gray-300': current !== index}"
                        class="w-3 h-3 rounded-full transition-all duration-300"></button>
            </template>
        </div>
    </div>
</section>

{{-- ✅ Kategori Populer --}}
<section class="py-10 bg-gray-50">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-2xl font-bold mb-6 text-gray-800">Kategori Populer</h2>
        <div class="flex flex-wrap justify-center gap-4">
            @php
                $categories = [
                    ['slug' => 'sepak-bola', 'color' => 'from-indigo-400 to-purple-500', 'label' => 'Sepak Bola'],
                    ['slug' => 'futsal', 'color' => 'from-green-400 to-blue-500', 'label' => 'Futsal'],
                    ['slug' => 'lari', 'color' => 'from-purple-400 to-pink-500', 'label' => 'Lari'],
                    ['slug' => 'clothing', 'color' => 'from-yellow-400 to-orange-500', 'label' => 'Clothing'],
                ];
            @endphp

            @foreach($categories as $cat)
                <a href="{{ url('/kategori/' . $cat['slug']) }}"
                   class="category-chip bg-gradient-to-r {{ $cat['color'] }} text-white p-4 rounded-2xl min-w-[120px] hover:scale-105 transition font-semibold shadow">
                    {{ $cat['label'] }}
                </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ✅ Produk Terbaru --}}
<main id="produk-terbaru" class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Produk Terbaru</h2>
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        @foreach ($products as $product)
        <div class="bg-white rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1 p-5 relative">
            @if($product->created_at->gt(now()->subDays(7)))
                <span class="absolute top-3 right-3 bg-red-500 text-white text-xs px-2 py-1 rounded-full shadow">
                    Baru
                </span>
            @endif
            <img
                src="{{ asset('storage/' . $product->gambar) }}"
                alt="{{ $product->nama }}"
                class="w-full h-48 object-contain bg-white rounded-xl mb-3">
            <span class="inline-block bg-gradient-to-r from-teal-400 to-cyan-500 text-white px-3 py-1 rounded-full text-xs mb-2 shadow-sm">
                {{ $product->kategori->nama ?? '-' }}
            </span>
            <h3 class="font-bold mt-1 mb-1 text-gray-800 text-lg">{{ $product->nama }}</h3>
            <span class="inline-block bg-gradient-to-r from-yellow-400 to-orange-500 text-white px-4 py-2 rounded-xl font-bold text-sm shadow">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </span>
            <a href="{{ route('pembeli.detail', $product->id) }}"
               class="block mt-4 bg-gradient-to-r from-indigo-600 to-purple-600 hover:brightness-110 text-white py-2 rounded-xl text-center font-medium transition">
                DETAIL PRODUK
            </a>
        </div>
        @endforeach
    </div>
</main>

{{-- ✅ Riwayat Pembelian Terakhir --}}
<section class="max-w-7xl mx-auto px-6 py-12">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Riwayat Terakhir Kamu</h2>

    @if ($riwayat->isEmpty())
        <p class="text-gray-600">Kamu belum pernah melakukan pembelian.</p>
    @else
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            @foreach ($riwayat as $pesanan)
                <div class="bg-gradient-to-tr from-indigo-100 to-purple-100 p-1 rounded-2xl shadow-md hover:shadow-lg transition">
                    <div class="bg-white rounded-2xl p-5">
                        <div class="flex justify-between items-center mb-3">
                            <div>
                                <p class="text-sm text-gray-500">#ORD{{ str_pad($pesanan->id, 4, '0', STR_PAD_LEFT) }}</p>
                                <p class="font-semibold text-gray-800">{{ $pesanan->created_at->format('d M Y') }}</p>
                            </div>
                            <span class="px-3 py-1 text-xs font-semibold rounded-full
                                @if($pesanan->status === 'Selesai') bg-green-100 text-green-700
                                @elseif($pesanan->status === 'Dibatalkan') bg-red-100 text-red-700
                                @else bg-yellow-100 text-yellow-700 @endif">
                                {{ $pesanan->status }}
                            </span>
                        </div>

                        <ul class="text-sm text-gray-700 list-disc list-inside space-y-1 mb-3">
                            @foreach ($pesanan->items as $item)
                                <li>{{ $item->produk->nama ?? '[Produk dihapus]' }} (x{{ $item->qty }})</li>
                            @endforeach
                        </ul>

                        <div class="text-right">
                            <a href="{{ route('pembeli.saya') }}" class="text-indigo-600 hover:underline text-sm font-medium">
                                Detail Pesanan →
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="text-right mt-6">
            <a href="{{ route('pembeli.saya') }}" class="text-indigo-700 hover:underline font-medium text-sm">
                Lihat Semua Pesanan →
            </a>
        </div>
    @endif
</section>


{{-- ✅ Testimoni Pelanggan --}}
<section class="bg-gray-100 py-12">
    <div class="max-w-7xl mx-auto px-6 text-center">
        <h2 class="text-2xl font-bold text-gray-800 mb-10">Apa Kata Mereka</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
            <div class="bg-white p-6 rounded-xl shadow text-left hover:shadow-md transition">
                <p class="italic text-gray-700">"Pelayanan cepat dan ramah. Barang original & sampai dengan aman."</p>
                <div class="mt-4 font-semibold text-indigo-600">– Lestari, Jakarta</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-left hover:shadow-md transition">
                <p class="italic text-gray-700">"Produknya lengkap! Dari sepatu sampai jersey semua ada!"</p>
                <div class="mt-4 font-semibold text-indigo-600">– Andre, Bandung</div>
            </div>
            <div class="bg-white p-6 rounded-xl shadow text-left hover:shadow-md transition">
                <p class="italic text-gray-700">"Sudah 3x belanja di ADDsports, puas terus!👍"</p>
                <div class="mt-4 font-semibold text-indigo-600">– Wulan, Surabaya</div>
            </div>
        </div>
    </div>
</section>

{{-- ✅ CTA --}}
<section class="py-12 bg-gradient-to-r from-pink-500 via-red-500 to-yellow-500 text-white text-center">
    <h2 class="text-2xl font-bold mb-3">Siap Checkout?</h2>
    <p class="mb-6 text-sm">Nikmati pengalaman belanja yang mudah dan cepat hanya di ADDsports</p>
    <a href="{{ route('pembeli.saya') }}">
        <button class="bg-white text-pink-600 px-8 py-3 rounded-xl font-semibold hover:bg-gray-100 transition">
            Lihat Pesanan Saya
        </button>
    </a>
</section>

@endsection
