<x-Cay-Canh-Layout>
    <x-slot name="title">Cây cảnh </x-slot>

    <style>
        .list-caycanh {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 20px;
        }

        .caycanh img {
            width: 100%;
            height: 200px;
            object-fit: cover;
        }

        .caycanh {
            position: relative;
            margin: 10px;
            text-align: center;
            padding-bottom: 35px;
        }

        .btn-add-product {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
<div style="margin:15px 0; text-align:center;">
    <span style="margin-right:10px;">Tìm kiếm theo</span>

    <a href="?sort=asc{{ request('easy') ? '&easy=1' : '' }}{{ request('shade') ? '&shade=1' : '' }}"
       class="btn btn-outline-secondary btn-sm">
        Giá tăng dần
    </a>

    <a href="?sort=desc{{ request('easy') ? '&easy=1' : '' }}{{ request('shade') ? '&shade=1' : '' }}"
       class="btn btn-outline-secondary btn-sm">
        Giá giảm dần
    </a>

    <a href="?easy=1{{ request('sort') ? '&sort='.request('sort') : '' }}"
       class="btn btn-outline-secondary btn-sm">
        Dễ chăm sóc
    </a>

    <a href="?shade=1{{ request('sort') ? '&sort='.request('sort') : '' }}"
       class="btn btn-outline-secondary btn-sm">
        Chịu được bóng râm
    </a>
</div>
    <div id='cay-canh-div'>
        <div class='list-caycanh'>
            @foreach($san_pham as $row)
                <div class='caycanh'>
                    <a href="{{url('san-pham/'.$row->id)}}">
                        <img src="{{ asset('storage/image/' . $row->hinh_anh) }}" width='200px' height='200px'><br>
                        <b>{{$row->ten_san_pham}}</b><br/>
                        <i>{{number_format($row->gia_ban,0,",",".")}}đ</i><br>
                    </a>
                    <div class='btn-add-product'>
                        <button class="btn btn-success btn-sm mb-1 add-product" data-id="{{$row->id}}">
                            Thêm vào giỏ hàng
                        </button>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    <script>

$(document).ready(function(){

    $(document).on("click", ".add-product", function(){
        let id = $(this).data("id");

        $.ajax({
            type: "POST",
            url: "{{ route('giohang.add') }}",
            data: {
                _token: "{{ csrf_token() }}",
                id: id,
                num: 1
            },
            success: function(res){
                $("#cart-number-product").html(res.count);
                alert("Đã thêm vào giỏ hàng");
}
        });

    });

});
    </script>

</x-Cay-Canh-Layout>