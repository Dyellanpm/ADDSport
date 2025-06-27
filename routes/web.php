<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PembeliController;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/', [ProductController::class, 'landing'])->name('landing');

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


// Halaman utama pembeli (Beranda)
Route::get('/pembeli', [PembeliController::class, 'beranda'])
    ->middleware(['auth'])
    ->name('pembeli.dashboard');

// Halaman kedua: Section pembelian
Route::get('/pembelian', [PembeliController::class, 'index'])
    ->middleware(['auth'])
    ->name('pembeli.section');

// Halaman terakhir: Checkout (nota pembelian)
Route::get('/pembelian/checkout', [PembeliController::class, 'checkout'])
    ->middleware(['auth'])
    ->name('pembeli.checkout');

// Halaman terakhir: Checkout (nota pembelian)
Route::get('/pembelian/saya', [PembeliController::class, 'saya'])
    ->middleware(['auth'])
    ->name('pembeli.saya');

// Halaman terakhir: Checkout (nota pembelian)
Route::get('/pembelian/selesai', [PembeliController::class, 'selesai'])
    ->middleware(['auth'])
    ->name('pembeli.selesai');

require __DIR__.'/auth.php';
