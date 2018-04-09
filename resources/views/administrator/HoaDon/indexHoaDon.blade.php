@extends('administrator.layouts.app')
@section('title','Quản lý sản phẩm')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fab fa-elementor pr-2"></i>Danh Sách Đơn Hàng</h1>
        <p>Bạn có thể quản lý đơn hàng</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <h5 class="card-title mx-3 my-3 ml-4">Danh Sách Đơn Hàng Mới</h5>
                </div>
                @foreach($errors->all() as $err)
                <div class="alert alert-warning" role="alert">
                    {{$err}}
                </div>
                @endforeach
                <table class="table table-striped table-bordered">
                    <thead class="text-primary">
                        <tr>
                            <th style="width:7%">Mã ĐH</th>
                            <th style="width:23%">Tên khách hàng</th>
                            <th style="width:20%">Số điện thoại</th>
                            <th style="width:30%">Địa chỉ</th>
                            <th style="width:10%">Trạng Thái</th>
                            <th style="width:10%">Công Cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($khachhang as $kh)
                        <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <tr>
                                <td id="name" style="width:7%">{{collect($hoadon)->where('IDUser',$kh->ID)->first()->ID}}</td>
                                <td style="width:23%;"><a href="{{Route('cthoadon',$kh->ID)}}">{{$kh->TenKhachHang}}</a></td>
                                <td style="width:20%;">{{$kh->SoDienThoai}}</td>
                                <td style="width:30%;">{{$kh->DiaChi}}</td>
                                <td style="width:10%">
                                    <span class="badge @if((collect($hoadon)->where('IDUser',$kh->ID)->first()->TrangThai)===1) badge-primary @else badge-danger @endif">
                                        @if((collect($hoadon)->where('IDUser',$kh->ID)->first()->TrangThai)===1){{'Đã Giao'}}@else{{'Đang Chờ'}}@endif
                                    </span>
                                </td>
                                <td style="width:10%">
                                    <a href="" class="btn btn-danger btn-sm xoa">
                                        <i class="far fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right mr-3">
                    {!! $khachhang->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
