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
         <label for="TenDanhMuc">Tên Danh Mục</label>
         <input type="text" class="form-control" id="TenDanhMuc" name="TenDanhMuc" placeholder="Nhập Tên Danh Mục" value="@if(isset($danhmucid)) {{$danhmucid->TenDanhMuc}} @endif">
     </div>
     <div class="form-group">
         <div class="input-group mb-3">
             <div class="input-group-prepend">
                 <label for="HinhAnh" class="input-group-text">Tải Ảnh Lên</label>
             </div>
             <div class="custom-file">
                 <input type="file" class="custom-file-input" id="HinhAnh" name="HinhAnh" hidden accept="image/*" style="display:none">
                 <label class="custom-file-label" id="HinhAnh1">@if(isset($danhmucid)){{$danhmucid->HinhAnh}}@endif</label>
             </div>
             <script type="text/javascript">
             $("#HinhAnh").change(function(){
                 $("#HinhAnh1").text(this.files[0].name);
             });
             </script>
         </div>
     </div>
     <div class="form-group">
        <label for="MoTa">Mô Tả</label>
        <textarea class="form-control" id="ckeditor" name="MoTa" rows="4">@if(isset($danhmucid)){!!$danhmucid->MoTa!!}@endif</textarea>
        <script type="text/javascript">
            CKEDITOR.replace("ckeditor");
        </script>
    </div>
    <button type="submit" class="btn btn-primary">@if(isset($danhmucid)){!!'Sửa Danh Mục'!!}@else{!!'Thêm Danh Mục'!!}@endif</button>
</form>
@endsection
