<x-cay-canh-layout>
    <x-slot name="title">
        Tìm kiếm sản phẩm
    </x-slot>
    <div class="title">
        Kết quả tìm kiếm cho từ khóa: <strong>{{ $tuKhoa }}</strong>
    </div>

    @if($sanPhams->count() > 0)
        <div class="list-cay-canh">
            @foreach($sanPhams as $sp)
                <div class="cay-canh">
                    <a href="{{ route('sanpham.show', $sp->id) }}">
                        <img src="{{ asset('storage/image/' . $sp->hinh_anh) }}" width="100%" alt="{{ $sp->ten_san_pham }}">
                    </a>

                    <div>
                        <a href="{{ route('sanpham.show', $sp->id) }}">
                            {{ $sp->ten_san_pham }}
                        </a>
                        <div class="gia">
                            {{ number_format($sp->gia_ban, 0, ',', '.') }} VND
                        </div>
                        
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="khong-co-du-lieu">
            Không tìm thấy sản phẩm nào phù hợp.
        </div>
    @endif
</x-cay-canh-layout>