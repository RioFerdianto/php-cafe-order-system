<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AdminController;

// Route::get('/menu2', function () {
//     return 'INI HALAMAN MENU DARI ROUTE LANGSUNG';
// });

// Route::get('/rio', function () {
//     return 'TES MENU';
// });
// Menu Routes
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');
Route::get('/admin/menu', [MenuController::class, 'adminIndex'])->name('admin.menu');
Route::get('/menu/create', [MenuController::class, 'create'])->name('menu.create');
Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
Route::get('/menu/{id}/edit', [MenuController::class, 'edit'])->name('menu.edit');
Route::put('/menu/{id}', [MenuController::class, 'update']);
Route::delete('/menu/{id}', [MenuController::class, 'destroy'])->name('menu.destroy');

// Order Routes
Route::get('/order', [OrderController::class, 'create']);
Route::post('/order', [OrderController::class, 'store']);
Route::get('/order/success', [OrderController::class, 'success']);

// Admin Routes
Route::get('/admin', [AdminController::class, 'index']);
Route::post('/admin/order/{id}/status', [AdminController::class, 'updateStatus']);

// Default Redirect
Route::get('/', function () {
    return redirect('/menu');
});
