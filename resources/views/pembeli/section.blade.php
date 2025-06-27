@extends('layouts.pembeli')

@section('title', 'Detail Produk')

@section('content')
<div class="max-w-6xl mx-auto px-4 py-10">

    {{-- 🔙 Tombol Kembali --}}
    <div class="mb-8">
        <a href="{{ url('/kategori/' . $product->kategori->slug) }}"
           class="inline-flex items-center gap-2 bg-white hover:bg-yellow-100 text-yellow-700 border border-yellow-400 px-5 py-2 rounded-full text-sm font-semibold shadow transition duration-200">
            ← Kembali Belanja
        </a>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <!-- Gambar Produk -->
        <div>
            <img
                src="{{ asset('storage/' . $product->gambar) }}"
                alt="{{ $product->nama }}"
                class="rounded-2xl shadow-xl w-full object-cover">
        </div>

        <!-- Informasi Produk -->
        <div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $product->nama }}</h1>
            <span class="inline-block bg-indigo-100 text-indigo-600 text-sm px-3 py-1 rounded-full mb-4">
                Kategori: {{ $product->kategori->nama ?? '-' }}
            </span>

            <p class="text-gray-600 mb-4 leading-relaxed">
                {{ $product->deskripsi }}
            </p>

            <div class="text-2xl font-extrabold text-indigo-700 mb-2">
                Rp {{ number_format($product->harga, 0, ',', '.') }}
            </div>

            <div class="text-sm text-gray-600 mb-6">
                Stok tersedia: {{ $product->stok }}
            </div>

            {{-- 🔁 Cek stok --}}
            @if ($product->stok <= 0)
                <div class="bg-red-100 text-red-700 px-4 py-3 rounded-xl shadow mb-6">
                    <strong>Stok Habis</strong><br>
                    Produk ini sedang tidak tersedia untuk dibeli saat ini.
                </div>
            @else
                <form action="{{ route('pembeli.keranjang.tambah') }}" method="POST" class="space-y-6">
                    @csrf
                    <input type="hidden" name="produk_id" value="{{ $product->id }}">

                    <div>
                        <label for="size" class="block text-sm font-medium text-gray-700 mb-1">Ukuran Tersedia</label>
                        <select id="size" name="size" class="w-full border border-gray-300 rounded-xl p-2" required>
                            <option value="">-- Pilih Ukuran --</option>
                            @foreach (explode(',', $product->size) as $size)
                                <option value="{{ trim($size) }}">{{ trim($size) }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label for="qty" class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                        <input type="number" id="qty" name="qty" min="1" max="{{ $product->stok }}" value="1"
                            class="w-full border border-gray-300 rounded-xl p-2" required>
                    </div>

                    <div class="flex flex-col md:flex-row gap-4">
                        <button type="submit"
                            class="w-full md:w-auto bg-yellow-500 hover:bg-yellow-600 text-white font-bold py-3 px-6 rounded-xl shadow transition">
                            🛒 Tambah ke Keranjang
                        </button>
                    </div>
                </form>
            @endif
        </div>
    </div>

    <!-- 🔽 Form Checkout Langsung -->
    @if ($product->stok > 0)
        <div id="form-checkout" class="mt-20 bg-white shadow-xl rounded-2xl p-8">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Formulir Pembelian Langsung</h2>
            <form action="{{ route('pembeli.checkout') }}" method="POST">
                @csrf

                {{-- Hidden field untuk produk --}}
                <input type="hidden" name="produk_id" value="{{ $product->id }}">
                <input type="hidden" name="qty" id="hidden-qty" value="1">
                <input type="hidden" name="size" id="hidden-size">

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                        <input type="text" id="nama" name="nama"
                            class="w-full border border-gray-300 rounded-xl p-3"
                            placeholder="Masukkan nama Anda" required>
                    </div>
                    <div>
                        <label for="no_hp" class="block text-sm font-medium text-gray-700 mb-1">No. HP</label>
                        <input type="text" id="no_hp" name="no_hp"
                            class="w-full border border-gray-300 rounded-xl p-3"
                            placeholder="08XXXXXXXXXX" required>
                    </div>
                </div>

                <div class="mb-6">
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat Pengiriman</label>
                    <textarea id="alamat" name="alamat" rows="4"
                        class="w-full border border-gray-300 rounded-xl p-3"
                        placeholder="Masukkan alamat lengkap" required></textarea>
                </div>

                <div class="mb-6">
                    <label for="metode_pembayaran" class="block text-sm font-medium text-gray-700 mb-1">Metode Pembayaran</label>
                    <select id="metode_pembayaran" name="metode_pembayaran"
                            class="w-full border border-gray-300 rounded-xl p-3" required>
                        <option value="">-- Pilih Metode Pembayaran --</option>
                        <option value="transfer_bank">Transfer Bank</option>
                        <option value="ewallet">E-Wallet (OVO, Dana, Gopay)</option>
                        <option value="cod">Bayar di Tempat (COD)</option>
                        <option value="qris">QRIS</option>
                    </select>
                </div>

                <button type="submit"
                    class="block w-full text-center bg-green-600 hover:bg-green-700 text-white font-bold py-3 rounded-xl">
                    Checkout Sekarang
                </button>
            </form>
        </div>
    @endif
</div>

{{-- ✅ JS untuk copy size & qty ke hidden input checkout --}}
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const sizeSelect = document.getElementById('size');
        const qtyInput = document.getElementById('qty');

        const hiddenSize = document.getElementById('hidden-size');
        const hiddenQty = document.getElementById('hidden-qty');

        if (sizeSelect) {
            hiddenSize.value = sizeSelect.value;
            sizeSelect.addEventListener('change', function () {
                hiddenSize.value = this.value;
            });
        }

        if (qtyInput) {
            hiddenQty.value = qtyInput.value;
            qtyInput.addEventListener('input', function () {
                hiddenQty.value = this.value;
            });
        }
    });
</script>
@endsection
