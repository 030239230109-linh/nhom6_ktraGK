<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SanPham1;
use App\Models\Category;

class SanPhamController1 extends Controller
{
    // HIỂN THỊ DANH SÁCH
   public function index()
{
    $products = SanPham1::where('status', 1)->get();
    $categories = Category::all();

    return view('sanpham.index', [
        'products' => $products,
        'categories' => $categories,
        'title' => 'Quản lý sản phẩm' // ✅ THÊM DÒNG NÀY
    ]);
}
    // XEM CHI TIẾT
    public function show($id)
    {
        $product = SanPham1::where('status', 1)->findOrFail($id);
        return view('sanpham.show', compact('product'));
    }

    // XÓA MỀM
    public function destroy($id)
    {
        $product = SanPham1::findOrFail($id);
        $product->status = 0;
        $product->save();

        return redirect()->route('sanpham.index')->with('success', 'Đã xóa sản phẩm');
    }
    public function create()
{
    $categories = Category::all();

    return view('sanpham.create', [
        'title' => 'Thêm sản phẩm',
        'categories' => $categories
    ]);
}
public function store(Request $request)
{
    // validate
    $request->validate([
        'ten_san_pham' => 'required',
        'ten_khoa_hoc' => 'required',
        'gia_ban' => 'required|numeric',
        'hinh_anh' => 'required|image|mimes:jpg,jpeg,png'
    ]);

    $fileName = null;

    // upload ảnh
    if ($request->hasFile('hinh_anh')) {
        $file = $request->file('hinh_anh');
        $fileName = time().'_'.$file->getClientOriginalName();

        $file->storeAs('public/image', $fileName);
    }

    // lưu DB
    SanPham1::create([
    'code' => uniqid(),
    'ten_san_pham' => $request->ten_san_pham,
    'ten_khoa_hoc' => $request->ten_khoa_hoc,
    'ten_thong_thuong' => $request->ten_thong_thuong,
    'mo_ta' => $request->mo_ta,
    'do_kho' => $request->do_kho,
    'yeu_cau_anh_sang' => $request->yeu_cau_anh_sang,
    'nhu_cau_nuoc' => $request->nhu_cau_nuoc,
    'gia_ban' => $request->gia_ban,
    'hinh_anh' => $fileName,
    'status' => 1
]);

    return redirect()->route('sanpham.index')->with('success', 'Thêm thành công');
}
}