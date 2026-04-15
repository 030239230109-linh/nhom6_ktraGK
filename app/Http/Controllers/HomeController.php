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

public function index()
{
    $san_pham = DB::table('san_pham')->limit(20)->get();
    $categories = DB::table('danh_muc')->get();

    return view('caycanh.index', compact('san_pham','categories'));
}


}
