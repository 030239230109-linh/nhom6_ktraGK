<?php

namespace App\Http\Controllers;

use App\Models\SanPham;
use Illuminate\Http\Request;

class SanPhamController extends Controller
{
    public function show($id)
    {
        $sanPham = SanPham::findOrFail($id);
        return view('sanpham.chitiet', compact('sanPham'));
    }

    public function timKiem(Request $request)
    {
        $tuKhoa = $request->keyword;

        $sanPhams = SanPham::where('ten_san_pham', 'like', '%' . $tuKhoa . '%')
            ->get();

        return view('sanpham.timkiem', compact('sanPhams', 'tuKhoa'));
    }
}