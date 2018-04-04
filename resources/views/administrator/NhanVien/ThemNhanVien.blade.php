@extends('administrator.layouts.app')
@section('title','Quản lý chủ đề')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fas fa-plus pr-2"></i>Thêm Nhân Viên</h1>
        <p>Bạn có thể thêm nhân viên</p>
    </div>
</div>
@foreach($errors->all() as $err)
     <div class="alert alert-danger" role="alert">
         {{$err}}
     </div>
 @endforeach
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<form method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
     <div class="form-group">
         <div class="row">
             <div class="col-md-8 col-sm-8">
                 <label for="TenDanhMuc">Tên Nhân Viên</label>
                 <input type="text" class="form-control" id="name" name="name" placeholder="Nhập Tên Nhân Viên">
             </div>
             <div class="col-md-4 col-sm-6">
                 <label for="TenDanhMuc">Số điệ thoại</label>
                 <input type="text" class="form-control" id="phone" name="phone" placeholder="Nhập SDT nhân viên">
             </div>
         </div>
     </div>
     <div class="form-group">
         <label for="TenDanhMuc">Địa Chỉ</label>
         <input type="text" class="form-control" id="address" name="address" placeholder="Nhập Tên Địa Chỉ">
     </div>
     <div class="form-group">
         <div class="row">
             <div class="col-md-6">
                 <label for="GiaSanPham">Email</label>
                 <input type="email" class="form-control" name="email" id="email" value="@if(isset($nhanvienid)){{$nhanvienid->email}}@endif" placeholder="Nhập email">
             </div>
             <div class="col-md-4">
                 <label for="DanhMuc">Quyền Hạn</label>
                 <select class="form-control" name="level" id="level" required="required">
                     <option value="0">
                         Quản Lý
                     </option>
                     <option value="1">
                         Quản Trị Viên
                     </option>
                 </select>
             </div>
         </div>
     </div>
     <button type="submit" class="btn btn-primary">Thêm Nhân Viên</button>
 </form>
@endsection
