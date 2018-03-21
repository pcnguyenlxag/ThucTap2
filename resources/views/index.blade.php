@extends('layouts.apps')
@section('header')
    @parent
@endsection
@section('content')
<div class="index-carousel">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-sm-12">
                <div class="main-slider">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="http://via.placeholder.com/870x550" alt="First slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="http://via.placeholder.com/870x550" alt="Second slide">
                            </div>
                            <div class="carousel-item">
                                <img class="d-block w-100" src="http://via.placeholder.com/870x550" alt="Third slide">
                            </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 d-sm-none d-md-block">
                <div class="sub-slider">
                    <div class="slider">
                        <a href="">
                            <img src="http://via.placeholder.com/430x350" alt="">
                        </a>
                    </div>
                    <div class="slider" style="margin-top:1rem;">
                        <a href="">
                            <img src="http://via.placeholder.com/430x190" alt="">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ***************** -->
<div class="category d-sm-none d-md-block">
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-md-3">
                <div class="category-slider">
                    <a href="">
                        <img class="rounded" src="http://via.placeholder.com/250x150" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-slider">
                    <a href="">
                        <img class="rounded" src="http://via.placeholder.com/250x150" alt="">
                    </a>
                </div>
            </div>
            <div class="col-md-3">
                <div class="category-slider">
                    <a href="">
                        <img class="rounded" src="http://via.placeholder.com/250x150" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ******************* -->
<div class="product">
    <div class="container-fluid">
        <div class=" d-flex flex-row">
            <div class="col-md-3 d-sm-none d-md-block">
                <div class="sidebar-img">
                    <img class="rounded" src="http://via.placeholder.com/300x350" alt="">
                    <img class="rounded mt-3" src="http://via.placeholder.com/300x150" alt="">
                </div>
            </div>
            <div class="col-md-9 pl-0">
                <div class="main-product">
                    <div class="product-intro">
                        <h1 class="product-title">Sản phẩm mới</h1>
                    </div>
                    <div class="product-item">
                        <div class="row">
                            @foreach($product as $value)
                            <a class="ml-3 mb-3" href="{{url('sanpham/chitiet/'.$value->ID)}}">
                                <div class="card">
                                    <img width="150" height="180" class="card-img-top" src="http://via.placeholder.com/250x150" alt="">
                                    <div class="card-body">
                                        <h3 class="card-text">{{$value->TenSanPham}}</h3>
                                        <p class="card-text price">{{$value->GiaSanPham}}  đ</p>
                                    </div>
                                    <div class="info">
                                        <span class="name-info"><h5>{{$value->TenSanPham}}</h5></span>
                                        <span class="price-info">
                                            <strong>Giá: {{$value->GiaSanPham}} đ</strong>
                                        </span>
                                        <span>{{$value->MoTa}}</span>
                                        <!-- <span>Cây sinh trưởng mạnh, kháng bệnh tốt, năng suất rất cao</span>
                                        <span>Thu Hoạch 45-50 ngày </span>
                                        <span>Trong Lượng khoản 350-400g</span> -->
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div> <!-- end 1 row -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
