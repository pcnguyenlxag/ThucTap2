@extends('administrator.layouts.app')
@section('title','Quản lý chủ đề')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card">
                <div class="card-block">
                    <div class="row">
                        <h5 class="card-title mx-3 my-3 ml-4">Danh Sách Danh Mục</h5>
                        <a href="{{Route('themdanhmuc')}}" class="btn btn-success ml-auto mr-4 my-2"><i class="fas fa-plus-circle mr-1" aria-hidden="true"></i>Thêm Danh Mục</a>
                    </div>
                    @foreach($errors->all() as $err)
                        <div class="alert alert-warning" role="alert">
                            {{$err}}
                        </div>
                    @endforeach
                    <table class="table table-striped table-bordered">
                        <thead class="text-primary">
                        <tr>
                            <th style="width:5%">ID</th>
                            <th style="width:20%">Tên Danh Mục</th>
                            <th style="width:15%">Hình Ảnh</th>
                            <th style="width:50%">Mô Tả</th>
                            <th style="width:10%">Công cụ</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php $temp=0; ?>
                        @foreach($danhmuc as $dm)
                            <?php $temp=$temp+1; ?>
                            <?php $path='/cuulongseed/public/Hinh-Anh/' ?>
                            <tr>
                                <th style="width:5%">{{$temp}}</th>
                                <td id="name" style="width:20%">{{$dm->TenDanhMuc}}</td>
                                <td style="width:15%"><img src="{{$path}}{{$dm->HinhAnh}}" alt="{{$dm->TenDanhMuc}}" class="img-thumbnail"></td>
                                <td style="max-width:50%; overflow:auto;">{!!html_entity_decode($dm->MoTa)!!}</td>
                                <td style="width:10%">
                                    <a href="{{Route('suadanhmuc',$dm->ID)}}" class="btn btn-success btn-sm">
                                        <i class="far fa-edit" aria-hidden="true"></i>
                                    </a>
                                    <a href="{{Route('xoadanhmuc',$dm->ID)}}" class="btn btn-danger btn-sm xoa">
                                        <i class="far fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="float-right mr-3">
                        {!! $danhmuc->render() !!}
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
