<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PenggunaController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PembeliController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/pembeli', [PembeliController::class, 'beranda'])
    ->middleware(['auth'])
    ->name('pembeli.dashboard');

Route::get('/pembelian', [PembeliController::class, 'index'])->name('pembeli.section');
Route::get('/pembelian/checkout', [PembeliController::class, 'checkout'])->name('pembeli.checkout');

Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Route Frontend Bagian Admin
Route::get('/pesanan', [PesananController::class, 'index'])->name('pesanan.index');
Route::get('/pengguna', [PenggunaController::class, 'index'])->name('pengguna.index');

// Route Admin Produk CRUD
Route::get('/produk', [ProductController::class, 'index'])->name('products.index');
Route::get('/produk/create', [ProductController::class, 'create'])->name('products.create');
Route::post('/produk', [ProductController::class, 'store'])->name('products.store');
Route::get('/produk/{product}/edit', [ProductController::class, 'edit'])->name('products.edit');
Route::put('/produk/{product}', [ProductController::class, 'update'])->name('products.update');
Route::delete('/produk/{product}', [ProductController::class, 'destroy'])->name('products.destroy');
Route::get('/', [ProductController::class, 'landing']);

require __DIR__.'/auth.php';
