<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;

Route::get('/san-pham/{id}', [SanPhamController::class, 'show'])->name('sanpham.show');
Route::post('/gio-hang/them', [GioHangController::class, 'add'])->name('giohang.add');
Route::post('/timkiem', [SanPhamController::class, 'timKiem'])->name('sanpham.timkiem');