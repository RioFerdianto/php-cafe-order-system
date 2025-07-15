<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;

// Halaman Awal
Route::get('/', [MenuController::class, 'home'])->name('home');
Route::view('/tentang', 'tentang')->name('tentang');
Route::view('/kontak', 'kontak')->name('kontak');

// Dashboard (untuk user login)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Order: hanya bisa diakses setelah login
Route::middleware('auth')->group(function () {
    // Profile (bawaan Breeze)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Order kopi
    Route::get('/order', [OrderController::class, 'create']);
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/order/success', [OrderController::class, 'success']);

    // Admin panel (kalau admin dibedakan nanti bisa tambahkan middleware khusus)
    Route::get('/admin', [AdminController::class, 'index']);
    Route::post('/admin/order/{id}/status', [AdminController::class, 'updateStatus']);
});

// Menu (tidak wajib login)
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

// Kelola menu (bisa dibatasi hanya untuk admin nanti)
Route::get('/admin/menu', [MenuController::class, 'adminIndex'])->name('admin.menu');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

// Auth (bawaan Breeze)
require __DIR__.'/auth.php';
