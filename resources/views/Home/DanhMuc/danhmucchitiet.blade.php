@extends('Home.layouts.apps')
@section('content')
<?php $path='/cuulongseed/public/Hinh-Anh/San-Pham/'; ?>
<div class="row">
    <div class="main-product ml-5 my-3">
        <div class="product-intro">
            <h1 class="product-title">Sản phẩm mới</h1>
        </div>
        <div class="product-item">
            <div class="row">
                @foreach($catelory as $value)
                <a class="ml-3 mb-3 item" href="{{url('sanpham/chitiet/'.$value->ID)}}">
                    <div class="card">
                        <img width="150" height="180" class="card-img-top" src="{{$path}}{{$value->HinhAnh}}" alt="{{$value->TenSanPham}}">
                        <div class="card-body">
                            <h3 class="card-text">{{$value->TenSanPham}}</h3>
                            <p class="card-text price">{{$value->GiaSanPham}}  đ</p>
                        </div>
                        <div class="info">
                            <span class="name-info"><h5>{{$value->TenSanPham}}</h5></span>
                            <span class="price-info">
                                <strong>Giá: {{$value->GiaSanPham}} đ</strong>
                            </span>
                            <span>{!!html_entity_decode($value->MoTa)!!}</span>
                        </div>
                    </div>
                </a>
                @endforeach
            </div> <!-- end 1 row -->
        </div>
    </div>
</div>
@endsection
