@extends('administrator.layouts.app')
@section('title','Quản lý sản phẩm')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="far fa-user pr-2"></i>Danh Sách Nhân Viên</h1>
        <p>Bạn có thể quản lý nhân viên</p>
    </div>
</div>
<div class="row">
    <div class="col-lg-12 mb-4">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <h5 class="card-title mx-3 my-3 ml-4">Danh Sách Nhân Viên</h5>
                    <a href="{{Route('themnhanvien')}}" class="btn btn-success ml-auto mr-4 my-2"><i class="fas fa-plus-circle mr-1" aria-hidden="true"></i>Thêm Nhân Viên</a>
                </div>
                @foreach($errors->all() as $err)
                <div class="alert alert-warning" role="alert">
                    {{$err}}
                </div>
                @endforeach
                <table class="table table-striped table-bordered">
                    <thead class="text-primary">
                        <tr>
                            <th style="width:20%">Tên Nhân Viên</th>
                            <th style="width:15%">Số Điện Thoại</th>
                            <th style="width:20%">Email</th>
                            <th style="width:20%">Địa Chỉ</th>
                            <th style="width:15%">Quản Trị Viên</th>
                            <th style="width:10%">Công cụ</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($nhanvien as $nv)
                        <form method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <tr>
                                <td id="name" style="width:15%">{{$nv->name}}</td>
                                <td style="width:15%;">{{$nv->phone}}</td>
                                <td style="width:20%;">{{$nv->email}}</td>
                                <td style="width:20%;">{{$nv->address}}</td>
                                <td style="width:15%;">
                                    <a href="{{Route('suanhanvien',$nv->id)}}" class="btn btn-sm doi @if($nv->level === 1) btn-success @else btn-danger @endif">
                                        @if($nv->level === 1)<i class="fas fa-check"></i>@else<i class="fas fa-ban"></i>@endif
                                    </a>
                                </td>
                                <td style="width:10%">
                                    <a href="{{Route('xoanhanvien',$nv->id)}}" class="btn btn-danger btn-sm xoa">
                                        <i class="far fa-trash-alt" aria-hidden="true"></i>
                                    </a>
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                <div class="float-right mr-3">
                    {!! $nhanvien->render() !!}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
