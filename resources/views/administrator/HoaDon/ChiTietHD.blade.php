@extends('administrator.layouts.app')
@section('title','Quản lý sản phẩm')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fab fa-elementor pr-2"></i>Thông Tin Đơn Hàng</h1>
        <h3><strong>Tên khách hàng:</strong> {{$khachhang->TenKhachHang}}</h3>
        <p><strong>Email:</strong> {{$khachhang->Email}}</p>
        <p><strong>Số điện thoại:</strong> {{$khachhang->SoDienThoai}}</p>
        <p><strong>Giới tính:</strong> @if($khachhang->GioiTinh==0){!!'Nam'!!}@else{!!'Nữ'!!}@endif</p>
        <p><strong>Địa chỉ:</strong> {{$khachhang->DiaChi}}</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <h5 class="card-title mx-3 my-3 ml-4">Danh Sách Sản Phẩm</h5>
                </div>
                @foreach($errors->all() as $err)
                <div class="alert alert-warning" role="alert">
                    {{$err}}
                </div>
                @endforeach
                <table class="table table-striped table-bordered">
                    <thead class="text-primary">
                        <tr>
                            <th style="width:5%">STT</th>
                            <th style="width:30%">Tên Sản Phẩm</th>
                            <th style="width:10%">Số Lượng Mua</th>
                            <th style="width:10%">Giá</th>
                            <th style="width:25%">Thành Tiền</th>
                            <th style="width:10%">Trạng Thái</th>
                            <th style="width:10%">Công Cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($chitiet as $ct)
                        <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <tr>
                                <td id="name" style="width:5%">{{$ct->IDChiTiet}}</td>
                                <td style="width:30%;">{{$ct->TenSanPham}}</td>
                                <td style="width:10%;">{{$ct->SoLuongMua}}</td>
                                <td style="width:10%;">{{$ct->GiaSanPham}}</td>
                                <td style="width:25%;"><?php $gia=$ct->SoLuongMua*$ct->GiaSanPham; echo $gia; ?></td>
                                <td style="width:10%"></td>
                                <td style="width:10%">
                                    <a href="{{Route('xoacthoadon',$ct->IDChiTiet)}}" class="btn btn-danger btn-sm xoa">
                                        <i class="far fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </td>

                            </tr>
                        </form>
                        @endforeach
                        <tr>
                            <td colspan="4"><strong>Tổng Tiền</strong></td>
                            <td>{{$ct->TongTien}}</td>
                            <td style="width:10%">
                                <a href="{{Route('trangthaihoadon',$ct->ID)}}" class="btn btn-sm @if($ct->TrangThai === 1) btn-success @else btn-danger @endif">
                                    @if($ct->TrangThai === 1){!!'Đã Giao'!!}@else{!!'Đang Chờ'!!}@endif
                                </a>
                            </td>
                        </tr>

                    </tbody>
                </table>
                <div class="float-right mr-3">
                    {!! $chitiet->render() !!}
                </div>
                <button type="submit" class="btn btn-primary">Khong ten</button>
            </div>
        </div>
    </div>
</div>
@endsection
