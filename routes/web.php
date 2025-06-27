<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;

// AUTH
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// LANDING PAGE
Route::get('/', [ProductController::class, 'landing'])->name('landing');

// ADMIN
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
    Route::get('/produk/create', [ProductController::class, 'create'])->name('products.create');
    Route::post('/produk', [ProductController::class, 'store'])->name('products.store');
    Route::get('/produk/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
    Route::put('/produk/{product}', [ProductController::class, 'update'])->name('products.update');
    Route::delete('/produk/{product}', [ProductController::class, 'destroy'])->name('products.destroy');

    Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
    Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');
});

// PEMBELI BERANDA
Route::get('/pembeli', [PembeliController::class, 'berandaPembeli'])
    ->middleware(['auth'])
    ->name('pembeli.dashboard');

// CHECKOUT & PESANAN
Route::get('/pembelian/checkout', [PembeliController::class, 'checkout'])->middleware(['auth'])->name('pembeli.checkout');
Route::get('/pembelian/saya', [PembeliController::class, 'saya'])->middleware(['auth'])->name('pembeli.saya');
Route::get('/pembelian/selesai', [PembeliController::class, 'selesai'])->middleware(['auth'])->name('pembeli.selesai');

// KATEGORI
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{slug}', [KategoriController::class, 'showBySlug'])->name('kategori.show');

// KERANJANG
Route::middleware('auth')->group(function () {
    Route::post('/keranjang/tambah', [KeranjangController::class, 'tambah'])->name('pembeli.keranjang.tambah'); // untuk menambah produk baru ke keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])->name('pembeli.keranjang.index');
    Route::delete('/keranjang/{id}', [KeranjangController::class, 'hapus'])->name('pembeli.keranjang.hapus');
    Route::post('/keranjang/{id}/kurangi', [KeranjangController::class, 'kurangi'])->name('pembeli.keranjang.kurangi');
    Route::post('/keranjang/{id}/tambah', [KeranjangController::class, 'tambahQty'])->name('pembeli.keranjang.tambahQty');
});

// PRODUK DETAIL UNTUK PEMBELI
Route::get('/produk/{id}', [PembeliController::class, 'show'])
    ->middleware(['auth'])
    ->name('pembeli.detail');

require __DIR__.'/auth.php';