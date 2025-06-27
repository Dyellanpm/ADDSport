<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PembeliController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\AdminDashboardController;

// ============================
// AUTHENTIKASI
// ============================
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// ============================
// LANDING PAGE (PUBLIK)
// ============================
Route::get('/', [ProductController::class, 'landing'])->name('landing');

// ============================
// ADMIN DASHBOARD & FITUR
// ============================
// Pastikan dashboard memakai controller untuk passing data
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('dashboard');

    // Produk CRUD
    Route::prefix('produk')->group(function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('/create', [ProductController::class, 'create'])->name('products.create');
        Route::post('/', [ProductController::class, 'store'])->name('products.store');
        Route::get('/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
        Route::put('/{product}', [ProductController::class, 'update'])->name('products.update');
        Route::delete('/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
    });

    // Pesanan
    Route::prefix('admin/pesanan')->group(function () {
        Route::get('/', [PesananController::class, 'index'])->name('pesanan.index');
        Route::put('/{id}/status', [PesananController::class, 'updateStatus'])->name('admin.pesanan.update-status');
    });
});

// ============================
// MANAJEMEN PENGGUNA (ADMIN ONLY)
// ============================
Route::middleware(['auth', AdminMiddleware::class])
    ->prefix('admin')
    ->group(function () {
        Route::resource('users', UserController::class)->names('admin.users');
    });

// ============================
// PEMBELI - BERANDA & DETAIL PRODUK
// ============================
Route::middleware('auth')->group(function () {
    Route::get('/pembeli', [PembeliController::class, 'berandaPembeli'])->name('pembeli.dashboard');
    Route::get('/produk/{id}', [PembeliController::class, 'show'])->name('pembeli.detail');
});

// ============================
// CHECKOUT & PESANAN PEMBELI
// ============================
Route::middleware('auth')->prefix('pembelian')->group(function () {
    Route::get('/checkout', [PembeliController::class, 'formCheckout'])->name('pembeli.formCheckout');
    Route::post('/checkout', [PembeliController::class, 'checkout'])->name('pembeli.checkout');
    Route::get('/saya', [PembeliController::class, 'saya'])->name('pembeli.saya');
    Route::get('/selesai', [PembeliController::class, 'selesai'])->name('pembeli.selesai');
});
Route::middleware('auth')->patch('/pesanan/{id}/selesai', [PembeliController::class, 'selesaikanPesanan'])->name('pembeli.pesanan.selesai');

// ============================
// KATEGORI PRODUK (PUBLIK)
// ============================
Route::get('/kategori', [KategoriController::class, 'index'])->name('kategori.index');
Route::get('/kategori/{slug}', [KategoriController::class, 'showBySlug'])->name('kategori.show');

// ============================
// KERANJANG PEMBELI
// ============================
Route::middleware('auth')->prefix('keranjang')->group(function () {
    Route::post('/tambah', [KeranjangController::class, 'tambah'])->name('pembeli.keranjang.tambah'); 
    Route::get('/', [KeranjangController::class, 'index'])->name('pembeli.keranjang.index');
    Route::delete('/{id}', [KeranjangController::class, 'hapus'])->name('pembeli.keranjang.hapus');
    Route::post('/{id}/kurangi', [KeranjangController::class, 'kurangi'])->name('pembeli.keranjang.kurangi');
    Route::post('/{id}/tambah', [KeranjangController::class, 'tambahQty'])->name('pembeli.keranjang.tambahQty');
});

// ============================
// AUTH DEFAULT
// ============================
require __DIR__.'/auth.php';
