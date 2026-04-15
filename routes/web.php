<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;

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


Route::get('/san-pham/{id}', [SanPhamController::class, 'show'])->name('sanpham.show');
Route::get('/gio-hang', [GioHangController::class, 'index'])->name('giohang.index');
Route::post('/timkiem', [SanPhamController::class, 'timKiem'])->name('sanpham.timkiem');

//câu 2
Route::get('/', [HomeController::class, 'trangchu']);
Route::get('/caycanh/theloai/{id}', [HomeController::class, 'theloai']);

//câu 3
Route::post('/giohang/add', [GioHangController::class, 'add'])->name('giohang.add');
Route::post('/giohang/delete/{id}', [GioHangController::class, 'delete'])
    ->name('cartdelete');
Route::post('/giohang/order', [GioHangController::class, 'order'])->name('ordercreate');

//câu 4.2
Route::post('/dat-hang', [GioHangController::class, 'datHang'])->name('giohang.dathang');