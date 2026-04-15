<h2>Giỏ hàng</h2>

@if(session('success'))
    <p style="color:green">{{session('success')}}</p>
@endif

<table border="1">
    <tr>
        <th>Tên</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Xóa</th>
    </tr>

    @foreach($cart as $id => $item)
    <tr>
        <td>{{$item['ten']}}</td>
        <td>{{number_format($item['gia'])}}</td>
        <td>{{$item['so_luong']}}</td>
        <td>
            <a href="{{route('cartdelete',$id)}}">Xóa</a>
        </td>
    </tr>
    @endforeach
</table>

<form action="{{route('cartorder')}}" method="POST">
    @csrf
    <button>Đặt hàng</button>
</form>
<div style='font-weight:bold;width:70%;margin:0 auto;text-align:center;'>
                    @auth
                        @if(count($data)>0)
                        <form method='post' action = "{{route('ordercreate')}}" >
                            Hình thức thanh toán <br>
                            <div class='d-inline-flex'>
                                <select name='hinh_thuc_thanh_toan' class='form-control form-control-sm'>
                                    <option value='1'>Tiền mặt</option>
                                    <option value='2'>Chuyển khoản</option>
                                    <option value='3'>Thanh toán VNPay</option>
                                </select>
                            </div><br>
                            <input type='submit' class='btn btn-sm btn-primary mt-1' value='ĐẶT HÀNG'>
                            {{ csrf_field() }}
                        </form>
                        @else
                            Vui lòng chọn sản phẩm cần mua

                        Vui lòng chọn sản phẩm cần mua
                        @endif
                    @else
                        Vui lòng đăng nhập trước khi đặt hàng
                    @endauth
                </div>
                </div>