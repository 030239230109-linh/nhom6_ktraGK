<x-cay-canh-layout :title="$title" :categories="$categories">

<h3 class="text-center text-primary mt-3">QUẢN LÝ SẢN PHẨM</h3>

<a href="{{ route('sanpham.create') }}" class="btn btn-success mb-3">Thêm</a>
<table id="productTable" class="table table-bordered table-striped">
    <thead>
        <tr>
            <th>Tên sản phẩm</th>
            <th>Tên khoa học</th>
            <th>Tên thông thường</th>
            <th>Độ khó</th>
            <th>Yêu cầu ánh sáng</th>
            <th>Nhu cầu nước</th>
            <th>Giá bán</th>
            <th>Ảnh</th>
            <th>Thao tác</th>
        </tr>
    </thead>

    <tbody>
        @foreach($products as $p)
        <tr>
            <td>{{ $p->ten_san_pham }}</td>
            <td>{{ $p->ten_khoa_hoc }}</td>
            <td>{{ $p->ten_thong_thuong }}</td>
            <td>{{ $p->do_kho }}</td>
            <td>{{ $p->yeu_cau_anh_sang }}</td>
            <td>{{ $p->nhu_cau_nuoc }}</td>
            <td>{{ number_format($p->gia_ban) }} đ</td>

            <td>
<img src="{{ asset('storage/image/'.$p->hinh_anh) }}" width="70">            </td>

            <td>
                <!-- XEM -->
                <a href="{{ route('sanpham.show', $p->id) }}" 
                   class="btn btn-primary btn-sm">
                    Xem
                </a>

                <!-- XÓA -->
                <form action="{{ route('sanpham.destroy', $p->id) }}" 
                      method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button onclick="return confirm('Bạn có chắc muốn xóa?')" 
                            class="btn btn-danger btn-sm">
                        Xóa
                    </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

<script>
$(document).ready(function () {
    $('#productTable').DataTable({
        pageLength: 10
    });
});
</script>

</x-cay-canh-layout>