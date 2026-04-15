
<x-cay-canh-layout>
    <x-slot name="title">
        chi tiết
    </x-slot>
    <div class="cay-canh-info">
        <div>
            <img src="{{ asset('storage/image/' . $sanPham->hinh_anh) }}" width="250" alt="{{ $sanPham->ten_san_pham }}">
        </div>

        <div>
            <h2 class="product-title">{{ $sanPham->ten_san_pham }}</h2>

            <div class="info-line">
                <span class="label">Tên khoa học:</span> {{ $sanPham->ten_khoa_hoc }}
            </div>

            <div class="info-line">
                <span class="label">Tên thông thường:</span> {{ $sanPham->ten_thong_thuong }}
            </div>

            <div class="info-line desc-text">
                <span class="label">Mô tả:</span>
                {{ $sanPham->mo_ta }}
            </div>
            <div>
                <span class="label">Quy cách sản phẩm:</span>
                <span class="spec-content">{{ $sanPham->quy_cach_san_pham }}</span>
            </div>

            <div class="info-line">
                <span class="label">Độ khó:</span> {{ $sanPham->do_kho }}
            </div>

            <div class="info-line">
                <span class="label">Yêu cầu ánh sáng:</span> {{ $sanPham->yeu_cau_anh_sang }}
            </div>

            <div class="info-line">
                <span class="label">Nhu cầu nước:</span> {{ $sanPham->nhu_cau_nuoc }}
            </div>

            <div class="price">
    <span>Giá:</span>
    <span style="color: red;">{{ number_format($sanPham->gia_ban, 0, ',', '.') }} VND</span>
</div>
    @csrf
 <form id="add-cart">
    @csrf
    <input type="hidden" name="id" value="{{ $sanPham->id }}">
    <input type="number" name="so_luong" value="1" min="1">

    <button type="submit">Thêm vào giỏ</button>
</form>
</form>

@if(session('success'))
    <div style="margin-top: 10px; color: green;">
        {{ session('success') }}
    </div>
@endif
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
$("#add-cart").submit(function(e){
    e.preventDefault();

    $.ajax({
        url: "{{ route('giohang.add') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(res){
            $("#cart-number-product").html(res.count);
            alert("Đã thêm vào giỏ hàng");
        }
    });
});
</script>
</x-cay-canh-layout>