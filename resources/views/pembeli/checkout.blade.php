@extends('layouts.pembeli')

@section('title', 'Pesanan Berhasil | ADDsports')

@section('content')
<div class="max-w-3xl mx-auto px-6 py-10">
    <div class="bg-white rounded-2xl shadow p-8">
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Nota Pembelian</h2>
                <p class="text-sm text-gray-500">Terima kasih telah berbelanja di <strong>ADDsports</strong></p>
            </div>
            <div class="text-green-500 text-3xl"><i class="fas fa-check-circle"></i></div>
        </div>

        <div class="mb-4 text-sm text-gray-600">
            <p><strong>No. Pesanan:</strong> #INV-{{ now()->format('His') }}</p>
            <p><strong>Tanggal:</strong> {{ now()->format('d M Y, H:i') }}</p>
            <p><strong>Metode Pembayaran:</strong> Transfer Bank</p>
        </div>

        <div class="border-t border-b py-4 mb-4">
            <table class="w-full text-sm text-left text-gray-700">
                <thead>
                    <tr class="text-gray-600 font-semibold">
                        <th class="py-2">Produk</th>
                        <th class="py-2 text-right">Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="border-t">
                        <td class="py-2">Sepatu Nike Air Max</td>
                        <td class="py-2 text-right">Rp 1.299.000</td>
                    </tr>
                    <tr class="border-t">
                        <td class="py-2">Jersey Home</td>
                        <td class="py-2 text-right">Rp 299.000</td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div class="text-sm text-gray-700 mb-4">
            <p><strong>Alamat Pengiriman:</strong></p>
            <p>Rizky Ortega<br>Jl. Contoh No.123, Jakarta<br>0812-3456-7890</p>
        </div>

        <div class="border-t pt-4">
            <div class="flex justify-between text-base font-semibold text-gray-800">
                <span>Total</span>
                <span>Rp 1.598.000</span>
            </div>
        </div>

        <a href="{{ route('pembeli.saya') }}" class="btn-primary text-white px-6 py-3 rounded-xl inline-block">
    <i class="fas fa-store mr-2"></i> Lihat Pesanan Saya
</a>

    </div>
</div>
@endsection
