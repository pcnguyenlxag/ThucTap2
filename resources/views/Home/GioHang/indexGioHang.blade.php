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
                <th style="width:10%">Số Lượng</th>
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
                    <td style="width:10%;">{{$item->qty}}</td>
                    <td style="width:20%;">{{$item->price}}</td>
                    <td style="width:20%;">{{$item->price*$item->qty}}</td>
                    <td style="width:10%;">
                        <a href="" class="btn btn-danger btn-sm xoa">
                            <i class="far fa-trash-alt" aria-hidden="true"></i>
                        </a>
                    </td>

                </tr>
            </form>
            @endforeach
            <tr>
                <td colspan="4"><strong>Tổng Tiền</strong></td>
                <td><?php $tong = substr(Cart::subtotal() ,0 , -3); echo $tong; ?> đ</td>
            </tr>

        </tbody>
    </table>
    <div class="d-flex flex-row-reverse bd-highlight">
        <div class="p-2 bd-highlight"><button type="submit" class="btn px-5" style="background-color:#ffc107;"> Đặt Hàng</button></div>
        <div class="p-2 bd-highlight">
            <div class="alert alert-success py-2" role="alert">
                Bạn có muốn chọn mua những sản phẩm chất lượng. Chúng tôi sẽ liên hệ với bạn sớm nhất
            </div>

        </div>
    </div>
</div>
@endsection
