@extends('administrator.layouts.app')
@section('title','Quản lý trang')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<?php $path='/cuulongseed/public/Hinh-Anh/Slider/' ?>
@foreach($errors->all() as $err)
    <div class="alert alert-warning" role="alert">
        {{$err}}
    </div>
@endforeach
<div class="row mb-3">
    <div class="col-md-12">
        <div class="card">
            <h5 class="card-title mx-3 my-3 ml-4">Slider</h5>
            <form method="post" enctype="multipart/form-data" style="width:100%;">
                {{ csrf_field() }}
                <div class="row mx-3 my-3">
                    <div class="col-md-9">
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <label for="HinhAnh" class="input-group-text">Tải Ảnh Lên</label>
                            </div>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="HinhAnh" name="HinhAnh" hidden accept="image/*" style="display:none">
                                <label class="custom-file-label" id="HinhAnh1"></label>
                            </div>
                            <script type="text/javascript">
                            $("#HinhAnh").change(function(){
                                $("#HinhAnh1").text(this.files[0].name);
                            });
                            </script>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <button type="submit" class="btn btn-primary"><i class="fas fa-plus-circle mr-1" aria-hidden="true"></i>Thêm Slider</button>
                    </div>
                </div>
            </form>
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th style="width:15%;" >STT</th>
                        <th style="width:65%;" >Hình Ảnh</th>
                        <th style="width:20%;" >Công Cụ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($slider as $sl)
                    <tr>
                        <th style="width:15%;">{{$sl->ID}}</th>
                        <td style="width:65%;" ><img src="{{$path}}{{$sl->HinhAnh}}" class="img-thumbnail img-fluid" style="max-height:7rem;"></td>
                        <td style="width:20%;">
                            <a href="{{Route('getxoaslider',$sl->ID)}}" class="btn btn-danger btn-sm xoa">
                                <i class="far fa-trash-alt" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div class="float-right mr-3">
                {!! $slider->render() !!}
            </div>
        </div>
    </div>
@endsection
