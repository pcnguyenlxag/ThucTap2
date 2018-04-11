@extends('Home.layouts.apps')
@section('content')
@foreach($errors->all() as $err)
<div class="alert alert-warning" role="alert">
    {{$err}}
</div>
@endforeach
<div class="container">
    <table class="table table-striped table-bordered mx-3 my-3">
        <thead class="text-primary">
            <tr>
                <th style="width:25%">Tên Sản Phẩm</th>
                <th style="max-width:15%;">Hình Ảnh</th>
                <th style="max-width:10%">Số Lượng</th>
                <th style="width:20%">Giá</th>
                <th style="width:20%">Thành Tiền</th>
                <th style="width:10%">Công Cụ</th>
            </tr>
        </thead>
        <tbody>
            @foreach($content as $item)
            <form method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <tr>
                    <td style="width:25%;">{{$item->name}}</td>
                    <td style="max-width:15%;"><img src="/cuulongseed/public/Hinh-Anh/San-Pham/{{$item->options->img}}" alt="{{$item->name}}" class="img-fluid img-thumbnail"></td>
                    <td style="max-width:10%;"><input type="number" name="soluong" min="1" value="{{$item->qty}}" class="w-100 soluong"></td>
                    <td style="width:20%;">{{$item->price}}</td>
                    <td style="width:20%;">{{$item->price*$item->qty}}</td>
                    <td style="width:10%;">
                        <a href="#" title="cập nhật số lượng" class="btn btn-sm suasanpham" id="{{$item->rowId}}" style="color:#fff;background-color:#3e94da; border-color:#1f77bd;">
                            <i class="fas fa-sync-alt"></i>
                        </a>
                        <a href="{{Route('xoasanphamgiohang', $item->rowId)}}" title="xóa sản phẩm" class="btn btn-danger btn-sm xoa">
                            <i class="far fa-trash-alt" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
            </form>
            @endforeach
            <tr>
                <td colspan="4"><strong>Tổng Tiền</strong></td>
                <td>{{Cart::subtotal()}} đ</td>
            </tr>
        </tbody>
    </table>
    <div class="d-flex flex-row-reverse bd-highlight">
        <div class="p-2 bd-highlight"><a href="{{Route('dathang')}}" class="btn px-5" style="background-color:#ffc107;"> Đặt Hàng</a></div>
        <div class="p-2 bd-highlight">
            <div class="alert alert-success py-2" role="alert">
                Bạn có muốn chọn mua những sản phẩm chất lượng. Chúng tôi sẽ liên hệ với bạn sớm nhất
            </div>

        </div>
    </div>
</div>
@endsection
