<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham;

class GioHangController extends Controller
{
    public function add(Request $request)
    {
        $id = $request->id;
        $soLuong = (int) $request->so_luong;

        if ($soLuong < 1) {
            $soLuong = 1;
        }

        $sanPham = SanPham::findOrFail($id);

        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['so_luong'] += $soLuong;
        } else {
            $cart[$id] = [
                'id' => $sanPham->id,
                'ten_san_pham' => $sanPham->ten_san_pham,
                'gia_ban' => $sanPham->gia_ban,
                'hinh_anh' => $sanPham->hinh_anh,
                'so_luong' => $soLuong,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->back()->with('success', 'Đã thêm vào giỏ hàng');
    }
}