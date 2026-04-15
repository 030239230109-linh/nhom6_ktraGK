<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\GioHangController;

Route::get('/', [HomeController::class, 'index']);


Route::get('/dashboard', function () {
    //return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



require __DIR__.'/auth.php';


Route::get('/san-pham/{id}', [SanPhamController::class, 'show'])->name('sanpham.show');
Route::post('/gio-hang/them', [GioHangController::class, 'add'])->name('giohang.add');
Route::post('/timkiem', [SanPhamController::class, 'timKiem'])->name('sanpham.timkiem');

//câu 2
Route::get('/', [HomeController::class, 'trangchu']);
Route::get('/caycanh/theloai/{id}', [HomeController::class, 'theloai']);

//câu 3
Route::post('/cart/add', [HomeController::class, 'add'])->name('cartadd');
Route::get('/cart', [HomeController::class, 'index'])->name('cart');
Route::get('/cart/delete/{id}', [HomeController::class, 'delete'])->name('cartdelete');
Route::post('/cart/order', [HomeController::class, 'order'])->name('cartorder');

