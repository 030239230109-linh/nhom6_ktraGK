<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

use App\Http\Controllers\SanPhamController1;
Route::get('/sanpham/create', [SanPhamController1::class, 'create'])->name('sanpham.create');
Route::post('/sanpham/store', [SanPhamController1::class, 'store'])->name('sanpham.store');
Route::get('/sanpham', [SanPhamController1::class, 'index'])->name('sanpham.index');
Route::get('/sanpham/{id}', [SanPhamController1::class, 'show'])->name('sanpham.show');
Route::delete('/sanpham/{id}', [SanPhamController1::class, 'destroy'])->name('sanpham.destroy');
require __DIR__.'/auth.php';
