@extends('administrator.layouts.app')
@section('title','Quản lý sản phẩm')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <h5 class="card-title mx-3 my-3 ml-4">Danh Sách Sản Phẩm</h5>
                        <a href="{{Route('themsanpham')}}" class="btn btn-success ml-auto mr-4 my-2"><i class="fas fa-plus-circle mr-1" aria-hidden="true"></i>Thêm Sản Phẩm</a>

                    </div>
                    @foreach($errors->all() as $err)
                        <div class="alert alert-warning" role="alert">
                            {{$err}}
                        </div>
                    @endforeach
                    <table class="table table-striped table-bordered">
                        <thead class="text-primary">
                            <tr>
                                <th style="width:15%">Tên Sản Phẩm</th>
                                <th style="width:15%">Hình Ảnh</th>
                                <th style="width:15%">Danh Mục</th>
                                <th style="width:10%">Giá Sản Phẩm</th>
                                <th style="width:10%">Số Lượng</th>
                                <th style="width:25%">Mô Tả</th>
                                <th style="width:10%">Công cụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $path='/cuulongseed/public/Hinh-Anh/San-Pham/' ?>
                        @foreach($sanpham as $sp)
                            <tr>
                                <td id="name" style="width:15%">{{$sp->TenSanPham}}</td>
                                <td style="width:15%;"><img src="{{$path}}{{$sp->HinhAnh}}" alt="{{$sp->TenSanPham}}" class="img-thumbnail"></td>
                                <td style="width:15%;">{{collect($danhmuc)->where('ID',$sp->IdDanhMuc)->first()->TenDanhMuc}}</td>
                                <td style="max-width:10%;">{{$sp->GiaSanPham}}</td>
                                <td style="max-width:10%;">@if($sp->SoLuong==0){!!'Hết Hàng'!!}@else{{$sp->SoLuong}}@endif</td>
                                <td style="max-width:25%;">{!!html_entity_decode($sp->MoTa)!!}</td>
                                <td style="width:10%">
                                    <a href="{{Route('suasanpham',$sp->ID)}}" class="btn btn-success btn-sm">
                                        <i class="far fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{Route('xoasanpham',$sp->ID)}}" class="btn btn-danger btn-sm xoa">
                                        <i class="far fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right mr-3">
                        {!! $sanpham->render() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
