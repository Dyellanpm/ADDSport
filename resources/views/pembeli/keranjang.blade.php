@extends('layouts.pembeli')

@section('title', 'Keranjang Saya')

@section('content')
<div class="px-4 py-10">
    <h2 class="text-3xl font-bold text-gray-800 mb-8 text-center">🛒 Keranjang Belanja</h2>

    @if (session('success'))
        <div class="mb-6 px-6 py-4 bg-green-100 text-green-800 rounded-xl shadow text-center">
            {{ session('success') }}
        </div>
    @endif

    @if($items->isEmpty())
        <div class="text-center text-gray-500">
            <p class="text-lg">Keranjang Anda masih kosong.</p>
            <a href="{{ url('/') }}"
               class="mt-4 inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
                Lanjut Belanja
            </a>
        </div>
    @else
        <div class="space-y-3 mb-32">
            @php $total = 0; @endphp
            @foreach($items as $item)
                @php
                    $subtotal = $item->produk->harga * $item->qty;
                    $total += $subtotal;
                @endphp

                <div class="bg-white rounded-xl shadow-sm p-3 flex items-center gap-3 max-w-3xl hover:shadow-md transition">
                    {{-- Gambar --}}
                    <img src="{{ asset('storage/' . $item->produk->gambar) }}"
                         class="w-16 h-16 object-contain bg-gray-50 p-1 rounded-md">

                    {{-- Info --}}
                    <div class="flex-1 text-sm cursor-pointer" onclick="location.href='{{ route('pembeli.detail', $item->produk->id) }}'">
                        <h3 class="font-semibold text-gray-800">{{ $item->produk->nama }}</h3>
                        <div class="text-gray-500">Ukuran: <strong>{{ $item->size ?? '-' }}</strong></div>
                        <div class="text-indigo-600 font-semibold mt-1">Rp {{ number_format($subtotal, 0, ',', '.') }}</div>
                    </div>

                    {{-- Kontrol: - qty + dan hapus --}}
                    <div class="flex flex-col items-center gap-1">
                        <div class="flex items-center gap-1">
                            {{-- Kurangi --}}
                            <form action="{{ route('pembeli.keranjang.kurangi', $item->id) }}" method="POST">
                                @csrf
                                <button class="w-7 h-7 bg-gray-200 rounded hover:bg-yellow-300 text-sm font-bold text-gray-700" title="Kurangi">–</button>
                            </form>

                            {{-- Qty --}}
                            <span class="text-sm font-semibold text-gray-800">{{ $item->qty }}</span>

                            {{-- Tambah --}}
                            <form action="{{ route('pembeli.keranjang.tambahQty', $item->id) }}" method="POST">

                                @csrf
                                <button class="w-7 h-7 bg-gray-200 rounded hover:bg-green-300 text-sm font-bold text-gray-700" title="Tambah">+</button>
                            </form>
                        </div>

                        {{-- Hapus --}}
                        <form action="{{ route('pembeli.keranjang.hapus', $item->id) }}" method="POST">
                            @csrf @method('DELETE')
                            <button class="text-red-500 hover:text-red-700 text-xl" title="Hapus">🗑️</button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>

{{-- Checkout Footer Fixed --}}
<div class="fixed bottom-0 left-0 right-0 bg-white border-t shadow-lg px-4 py-4 z-50">
    <div class="max-w-4xl mx-auto flex flex-col md:flex-row md:justify-between md:items-center gap-4 md:gap-0">
        
        {{-- Total di kiri --}}
        <div class="text-lg font-semibold text-gray-700 text-center md:text-left">
            Total: <span class="text-indigo-600">Rp {{ number_format($total, 0, ',', '.') }}</span>
        </div>

        {{-- Tombol Checkout di kanan --}}
                    <div class="text-center md:text-right">
                        <a href="{{ route('pembeli.checkout') }}"
                        class="bg-yellow-500 hover:bg-yellow-600 text-white px-6 py-3 rounded-xl font-bold transition shadow-lg">
                            ✅ Checkout Sekarang
                        </a>
                    </div>
                </div>
            </div>
    @endif
</div>
@endsection
