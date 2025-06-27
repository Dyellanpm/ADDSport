@extends('layouts.pembeli')

@section('title', 'Pesanan Saya')

@section('content')
<div class="max-w-7xl mx-auto px-4 py-12">
    <h2 class="text-4xl font-extrabold text-center text-indigo-800 mb-10 tracking-tight">📦 Riwayat Pesanan Kamu</h2>

    @if (session('success'))
        <div class="mb-6 px-6 py-4 bg-green-100 text-green-800 rounded-xl shadow text-center font-medium">
            {{ session('success') }}
        </div>
    @endif

    <div class="grid md:grid-cols-2 gap-8">
        @forelse ($pesanans->where('status', '!=', 'Selesai') as $pesanan)
            <div class="rounded-2xl border border-gray-200 shadow-lg overflow-hidden bg-white hover:shadow-xl transition duration-300">
                {{-- Header --}}
                <div class="bg-indigo-50 px-6 py-4 flex justify-between items-start md:items-center border-b border-gray-200">
                    <div>
                        <h3 class="text-lg font-bold text-indigo-700">
                            #{{ str_pad($pesanan->id, 3, '0', STR_PAD_LEFT) }} - {{ $pesanan->nama }}
                        </h3>
                        <p class="text-sm text-gray-500">Tanggal: {{ $pesanan->created_at->format('d F Y') }}</p>
                    </div>
                    <div class="flex flex-col text-right gap-1">
                        <span class="px-3 py-1 rounded-full text-sm font-medium w-fit
                            @if($pesanan->status === 'Selesai') bg-green-100 text-green-700
                            @else bg-yellow-100 text-yellow-700 @endif">
                            {{ $pesanan->status }}
                        </span>
                        <span class="text-sm text-gray-600">Metode: <strong>{{ $pesanan->metode_pembayaran }}</strong></span>
                    </div>
                </div>

                {{-- Info Pembeli --}}
                <div class="px-6 py-4 bg-gray-50 text-sm grid grid-cols-1 gap-2 border-b border-gray-100 text-gray-700">
                    <div><strong>📍 Alamat:</strong> {{ $pesanan->alamat }}</div>
                    <div><strong>📞 No HP:</strong> {{ $pesanan->no_hp }}</div>
                    <div><strong>👤 Pemesan:</strong> {{ $pesanan->nama }}</div>
                </div>

                {{-- Daftar Produk --}}
                <div class="px-6 py-4 space-y-3 bg-white">
                    @foreach ($pesanan->items as $item)
                        <div class="flex items-center border rounded-xl p-3 bg-slate-50 hover:bg-slate-100 transition">
                            <img src="{{ asset('storage/' . ($item->produk->gambar ?? 'placeholder.jpg')) }}"
                                 class="w-16 h-16 rounded object-cover mr-4 border" alt="Produk">
                            <div class="flex-1 text-sm text-gray-800">
                                <div class="font-semibold">{{ $item->produk->nama ?? '[Produk dihapus]' }}</div>
                                <div class="text-xs text-gray-500 mt-1">
                                    Size: <span class="bg-white border px-2 py-0.5 rounded">{{ $item->size ?? '-' }}</span> •
                                    Qty: <span class="bg-indigo-100 px-2 py-0.5 rounded">{{ $item->qty }}</span>
                                </div>
                            </div>
                            <div class="text-sm font-bold text-indigo-700 text-right w-24">
                                Rp {{ number_format($item->produk->harga ?? 0, 0, ',', '.') }}
                            </div>
                        </div>
                    @endforeach
                </div>

                {{-- Footer --}}
                <div class="px-6 py-4 bg-indigo-50 border-t border-gray-200 flex flex-wrap justify-between items-center gap-3">
                    <div class="text-sm text-gray-600">
                        🛒 <strong>{{ $pesanan->items->sum('qty') }}</strong> produk
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        <a href="{{ route('pembeli.dashboard') }}" 
                           class="bg-indigo-600 text-white text-sm px-4 py-2 rounded-full hover:bg-indigo-700 transition font-medium">
                            Lanjut Belanja
                        </a>
                        <a href="{{ route('pembeli.selesai') }}" 
                           class="bg-gray-200 text-gray-700 text-sm px-4 py-2 rounded-full hover:bg-gray-300 transition font-medium">
                            Detail
                        </a>

                        {{-- ✔️ Pesanan Diterima --}}
                        @if($pesanan->status === 'Dikirim')
                        <form action="{{ route('pembeli.pesanan.selesai', $pesanan->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <button type="submit"
                                class="bg-green-600 text-white text-sm px-4 py-2 rounded-full hover:bg-green-700 transition font-medium">
                                ✔️ Pesanan Diterima
                            </button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-gray-600 py-20 col-span-2">
                <p class="text-lg">💬 Kamu belum memiliki pesanan aktif.</p>
                <a href="{{ route('pembeli.dashboard') }}" class="mt-4 inline-block text-indigo-600 hover:underline text-sm">
                    Belanja Sekarang →
                </a>
            </div>
        @endforelse
    </div>
</div>
@endsection
