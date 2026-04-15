<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Đặt hàng thành công</title>
</head>
<body>
    <h2>Đặt hàng thành công</h2>

    <p>Cảm ơn bạn đã đặt hàng tại cửa hàng cây cảnh.</p>

    <p>Danh sách sản phẩm:</p>
    <ul>
        @php $tongTien = 0; @endphp
        @foreach($cart as $item)
            @php $thanhTien = $item['gia_ban'] * $item['so_luong']; $tongTien += $thanhTien; @endphp
            <li>
                {{ $item['ten_san_pham'] }} -
                Số lượng: {{ $item['so_luong'] }} -
                Giá: {{ number_format($item['gia_ban'], 0, ',', '.') }} đ
            </li>
        @endforeach
    </ul>

    <p><strong>Tổng tiền:</strong> {{ number_format($tongTien, 0, ',', '.') }} đ</p>

    <p>Trân trọng.</p>
</body>
</html>