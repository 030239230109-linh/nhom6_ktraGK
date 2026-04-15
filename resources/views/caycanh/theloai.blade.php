<div class="list-cay-canh">
    @foreach($san_pham as $item)
        <div class="cay-canh">
            <img src="{{ asset('storage/app/public/image/'.$item->hinh_anh) }}">

            <div class="cay-canh-info">
                <h5>{{ $item->ten_san_pham }}</h5>
                <p>{{ number_format($item->gia_ban) }} VNĐ</p>
            </div>
        </div>
    @endforeach
</div>