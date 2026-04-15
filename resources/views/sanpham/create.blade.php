<x-cay-canh-layout :title="$title" :categories="$categories">

<h3 class="text-center text-primary">THÊM SẢN PHẨM</h3>

<form action="{{ route('sanpham.store') }}" method="POST" enctype="multipart/form-data">
@csrf

<div class="mb-2">
    <label>Tên sản phẩm</label>
    <input type="text" name="ten_san_pham" class="form-control">
</div>

<div class="mb-2">
    <label>Tên khoa học</label>
    <input type="text" name="ten_khoa_hoc" class="form-control">
</div>

<div class="mb-2">
    <label>Tên thông thường</label>
    <input type="text" name="ten_thong_thuong" class="form-control">
</div>

<div class="mb-2">
    <label>Mô tả</label>
    <textarea name="mo_ta" class="form-control"></textarea>
</div>

<div class="mb-2">
    <label>Độ khó</label>
    <input type="text" name="do_kho" class="form-control">
</div>

<div class="mb-2">
    <label>Yêu cầu ánh sáng</label>
    <input type="text" name="yeu_cau_anh_sang" class="form-control">
</div>

<div class="mb-2">
    <label>Nhu cầu nước</label>
    <input type="text" name="nhu_cau_nuoc" class="form-control">
</div>

<div class="mb-2">
    <label>Giá bán</label>
    <input type="number" name="gia_ban" class="form-control">
</div>

<div class="mb-2">
    <label>Ảnh</label>
    <input type="file" name="hinh_anh" class="form-control">
</div>

<button class="btn btn-primary">Lưu</button>

</form>

</x-cay-canh-layout>