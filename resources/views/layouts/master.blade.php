@php
    $cart = session('cart', []);
    $tongSoLuong = 0;
    foreach ($cart as $item) {
        $tongSoLuong += $item['so_luong'];
    }
@endphp

<a href="{{ url('/gio-hang') }}" class="btn btn-outline-primary">
    Giỏ hàng ({{ $tongSoLuong }})
</a>