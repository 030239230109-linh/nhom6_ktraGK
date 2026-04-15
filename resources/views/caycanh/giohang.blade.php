<x-cay-canh-layout>
    <x-slot name='title'>
        Đặt hàng
    </x-slot>

    <div>
        <div style='color:#15c; font-weight:bold;font-size:15px;text-align:center'>
            DANH SÁCH SẢN PHẨM
        </div>

        <table class="table text-center align-middle" 
               style="width:70%; margin:0 auto; background:#fff; border-collapse:collapse;">
            <thead class="table-light">
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Số lượng</th>
                    <th>Đơn giá</th>
                    <th>Xóa</th>
                </tr>
            </thead>

            <tbody>
                @php $tongTien = 0; @endphp

                @foreach(($cart ?? []) as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>

                    <td class="text-start">
                        {{ $item['ten_san_pham'] ?? 'Không có tên' }}
                    </td>

                    <td>
                        {{ $item['so_luong'] ?? 1 }}
                    </td>

                    <td>
                        {{ number_format($item['gia_ban'] ?? 0, 0, ',', '.') }}đ
                    </td>

                    <td>
 <form method="POST" action="{{ route('cartdelete', $key) }}">
    @csrf
    <button type="submit">Xóa</button>
</form>
                    </td>
                </tr>

                @php
                    $tongTien += ($item['so_luong'] ?? 1) * ($item['gia_ban'] ?? 0);
                @endphp
                @endforeach

                <tr class="fw-bold">
                    <td colspan="3">Tổng cộng</td>
                    <td class="text-danger">
                        {{ number_format($tongTien, 0, ',', '.') }}đ
                    </td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <style>
            .table th, .table td {
                border: 1px solid #000 !important;
                padding: 8px;
            }
        </style>
        <form action="{{ route('giohang.dathang') }}" method="POST">
    @csrf
    <button type="submit" class="btn btn-primary">Đặt hàng</button>
</form>

        <div style='font-weight:bold;width:70%;margin:0 auto;text-align:center; margin-top:15px;'>
            @auth
                @if(!empty($cart) && count($cart) > 0)

                    <form method='post' action="{{ route('ordercreate') }}">
                        @csrf

                        Hình thức thanh toán <br>

                        <select name='hinh_thuc_thanh_toan' class='form-control form-control-sm'>
                            <option value='1'>Tiền mặt</option>
                            <option value='2'>Chuyển khoản</option>
                            <option value='3'>Thanh toán VNPay</option>
                        </select>

                        <br>

                        <input type='submit' class='btn btn-sm btn-primary mt-1' value='ĐẶT HÀNG'>
                    </form>

                @else
                    Vui lòng chọn sản phẩm cần mua
                @endif
            @else
                Vui lòng đăng nhập trước khi đặt hàng
            @endauth
        </div>
    </div>
</x-cay-canh-layout>