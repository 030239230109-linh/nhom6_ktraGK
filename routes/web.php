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

