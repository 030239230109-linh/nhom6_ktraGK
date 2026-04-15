<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class GioHangController extends Controller
{
    // VIEW CART
    public function index()
    {
        $cart = session('cart', []);
        return view('caycanh.giohang', compact('cart'));
    }

    // ADD CART (AJAX)
    public function add(Request $request)
    {
        $id = $request->id;
        $soLuong = $request->so_luong;

        $sp = DB::table('san_pham')->where('id', $id)->first();

        if (!$sp) {
            return response()->json(['error' => true]);
        }

        $cart = session('cart', []);

        if (isset($cart[$id])) {
            $cart[$id]['so_luong'] += $soLuong;
        } else {
            $cart[$id] = [
                'id' => $sp->id,
                'ten_san_pham' => $sp->ten_san_pham,
                'gia_ban' => $sp->gia_ban,
                'hinh_anh' => $sp->hinh_anh,
                'so_luong' => $soLuong,
            ];
        }

        session(['cart' => $cart]);

        return response()->json([
            'count' => count($cart)
        ]);
    }

    // DELETE
public function delete($id)
{
    $cart = session('cart', []);

    unset($cart[$id]);

    session(['cart' => $cart]);

    return back();
}

    // ORDER
    public function order(Request $request)
    {
        $cart = session('cart', []);

        if (empty($cart)) return back();

        $orderId = DB::table('don_hang')->insertGetId([
            'ngay_dat_hang' => now(),
            'tinh_trang' => 1,
            'hinh_thuc_thanh_toan' => $request->hinh_thuc_thanh_toan,
            'user_id' => auth()->id() ?? 1
        ]);

        foreach ($cart as $item) {
            DB::table('chi_tiet_don_hang')->insert([
                'ma_don_hang' => $orderId,
                'san_pham_id' => $item['id'],
                'so_luong' => $item['so_luong'],
                'don_gia' => $item['gia_ban'],
            ]);
        }

        session()->forget('cart');

        return back()->with('success', 'Đặt hàng thành công');
    }
}