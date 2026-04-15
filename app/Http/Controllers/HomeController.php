<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class HomeController extends Controller
{
    // Câu 2
    // Trang chủ: hiển thị 20 sản phẩm
    public function trangchu(Request $request)
    {
        $query = DB::table('san_pham');

        // lọc dễ chăm sóc
        if ($request->easy) {
            $query->where('do_kho', 'like', '%Dễ%');
        }

        // lọc bóng râm
        if ($request->shade) {
            $query->where('yeu_cau_anh_sang', 'like', '%râm%');
        }

        // sắp xếp
        if ($request->sort == 'asc') {
            $query->orderBy('gia_ban', 'asc');
        } elseif ($request->sort == 'desc') {
            $query->orderBy('gia_ban', 'desc');
        }

        $san_pham = $query->limit(20)->get();
        $categories = DB::table('danh_muc')->get();

        return view('caycanh.index', compact('san_pham', 'categories'));
    }

public function theloai(Request $request, $id)
{
    $query = DB::table('san_pham')
        ->join('sanpham_danhmuc', 'san_pham.id', '=', 'sanpham_danhmuc.id_san_pham')
        ->where('sanpham_danhmuc.id_danh_muc', $id);

    // lọc dễ chăm
    if ($request->easy) {
        $query->where('san_pham.do_kho', 'like', '%Dễ%');
    }

    // lọc bóng râm
    if ($request->shade) {
        $query->where('san_pham.yeu_cau_anh_sang', 'like', '%râm%');
    }

    // sắp xếp
    if ($request->sort == 'asc') {
        $query->orderBy('san_pham.gia_ban', 'asc');
    } elseif ($request->sort == 'desc') {
        $query->orderBy('san_pham.gia_ban', 'desc');
    }

    $san_pham = $query->select('san_pham.*')->get();

    $categories = DB::table('danh_muc')->get();

    return view('caycanh.index', compact('san_pham','categories'));
}


    // Câu 4
    public function add(Request $request)
{
    $id = $request->id;
    $num = $request->num;

    $san_pham = DB::table('san_pham')->where('id', $id)->first();

    $cart = Session::get('cart', []);

    if(isset($cart[$id])){
        $cart[$id]['so_luong'] += $num;
    } else {
        $cart[$id] = [
            'ten' => $product->ten_san_pham,
            'gia' => $product->gia_ban,
            'hinh' => $product->hinh_anh,
            'so_luong' => $num
        ];
    }

    Session::put('cart', $cart);

    return count($cart); // trả về số lượng sản phẩm
}

public function index()
{
    $san_pham = DB::table('san_pham')->limit(20)->get();
    $categories = DB::table('danh_muc')->get();

    return view('caycanh.index', compact('san_pham','categories'));
}

public function delete($id)
{
    $cart = Session::get('cart');

    unset($cart[$id]);

    Session::put('cart', $cart);

    return redirect()->back();
}

public function order()
{
    $cart = Session::get('cart');

    if(!$cart) return redirect()->back();

    // tạo đơn hàng
    $order_id = DB::table('don_hang')->insertGetId([
        'ngay_dat_hang' => now(),
        'tinh_trang' => 1,
        'hinh_thuc_thanh_toan' => 1,
        'user_id' => 1
    ]);

    // chi tiết đơn
    foreach($cart as $id => $item){
        DB::table('chi_tiet_don_hang')->insert([
            'ma_don_hang' => $order_id,
            'id_san_pham' => $id,
            'so_luong' => $item['so_luong'],
            'don_gia' => $item['gia']
        ]);
    }

    Session::forget('cart');

    return redirect()->back()->with('success', 'Đặt hàng thành công!');
} 
}
