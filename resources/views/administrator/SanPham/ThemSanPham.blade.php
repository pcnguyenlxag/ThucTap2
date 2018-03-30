@extends('administrator.layouts.app')
@section('title','Quản lý chủ đề')
@section('content')
@foreach($errors->all() as $err)
     <div class="alert alert-danger" role="alert">
         {{$err}}
     </div>
 @endforeach
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<form method="post" enctype="multipart/form-data">
     {{ csrf_field() }}
     <div class="form-group">
         <label for="TenDanhMuc">Tên Sản Phẩm</label>
         <input type="text" class="form-control" id="TenDanhMuc" name="TenSanPham" placeholder="Nhập Tên Sản Phẩm" value="@if(isset($sanphamid)) {{$sanphamid->TenSanPham}} @endif">
     </div>
     <div class="form-group">
         <div class="row">
             <div class="col-md-4">
                 <label for="DanhMuc">Danh Mục</label>
                 <select class="form-control" name="IdDanhMuc" id="DanhMuc" required="required">
                     @foreach($danhmuc as $dm)
                     <option value="{{$dm->ID}}" @if(isset($sanphamid)) @if($sanphamid->IdDanhMuc == $dm->ID) selected="selected" @endif @endif>
                         {{$dm->TenDanhMuc}}
                     </option>
                     @endforeach
                 </select>
             </div>
             <div class="col-md-4">
                 <label for="GiaSanPham">Giá Sản Phẩm</label>
                 <input type="number" class="form-control" min="0" step="50" name="GiaSanPham" id="GiaSanPham" value="@if(isset($sanphamid)){{$sanphamid->GiaSanPham}}@endif" placeholder="Nhập giá sản phẩm" style="width:100%;">
             </div>
             <div class="col-md-4">
                 <label for="SoLuong">Số Lượng Sản Phẩm</label>
                 <input type="number" class="form-control" min="0" step="1" name="SoLuong" id="SoLuong" value="@if(isset($sanphamid)){{$sanphamid->SoLuong}}@endif" placeholder="Nhập số lượng sản phẩm" style="width:100%;">
             </div>
         </div>
     </div>
     <div class="form-group">
         <div class="input-group mb-3">
             <div class="input-group-prepend">
                 <label for="HinhAnh" class="input-group-text">Tải Ảnh Lên</label>
             </div>
             <div class="custom-file">
                 <input type="file" class="custom-file-input" id="HinhAnh" name="HinhAnh" hidden accept="image/*" style="display:none">
                 <label class="custom-file-label" id="HinhAnh1">@if(isset($sanphamid)){{$sanphamid->HinhAnh}}@endif</label>
             </div>
             <script type="text/javascript">
             $("#HinhAnh").change(function(){
                 $("#HinhAnh1").text(this.files[0].name);
             });
             </script>
         </div>
     </div>
     <div class="form-group">
         <div class="row">
             <div class="col-md-5">
                 <label for="MoTa">Mô Tả</label>
                 <textarea class="form-control" id="ckeditor" name="MoTa" rows="4">@if(isset($sanphamid)){!!$sanphamid->MoTa!!}@endif</textarea>
                 <script type="text/javascript">
                    CKEDITOR.replace("ckeditor");
                 </script>
             </div>
             <div class="col-md-7">
                 <label for="MoTa">Thuộc Tính</label>
                 <textarea class="form-control" id="ckeditor2" name="ThuocTinh" rows="4">@if(isset($sanphamid)){!!$sanphamid->ThuocTinh!!}@endif</textarea>
                 <script type="text/javascript">
                    CKEDITOR.replace("ckeditor2");
                 </script>
             </div>
         </div>
     </div>
     <button type="submit" class="btn btn-primary">@if(isset($sanphamid)){!!'Sửa Sản Phẩm'!!}@else{!!'Thêm Sản Phẩm'!!}@endif</button>
 </form>
@endsection
