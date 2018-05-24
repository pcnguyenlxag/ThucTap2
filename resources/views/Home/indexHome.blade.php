@extends('Home.layouts.apps')
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
                            @foreach($slider as $value)
                            <div class="carousel-item">
                                <img class="d-block w-100 img-fluid" src="/cuulongseed/public/Hinh-Anh/Slider/{{$value->HinhAnh}}" alt="First slide">
                            </div>
                            @endforeach
                            <script type="text/javascript">
                            $(document).ready(function() {
                                $('.carousel-item').each(function(i) {
                                    if ( i === 0 ) {
                                        $(this).addClass('active');
                                    }
                                });
                            });
                            </script>
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
            <div class="col-md-4 d-sm-none d-md-block pl-0">
                <div class="sub-slider">
                    @foreach($subslider as $value)
                    <div class="slider my-1">
                        <a href="">
                            <img class="img-fluid" src="/cuulongseed/public/Hinh-Anh/Slider/{{$value->HinhAnh}}" >
                        </a>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

<!-- ******************************* -->
<div class="product">
    <div class="container-fluid">
        <div class=" d-flex flex-row">
            <div class="col-md-3 d-sm-none d-md-block">
                <div class="sidebar-img">
                    @foreach($banner as $bn)
                    <img class="rounded img-fluid my-1" src="/cuulongseed/public/Hinh-Anh/Slider/{{$bn->HinhAnh}}">
                    @endforeach
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
                            <a class="ml-3 mb-3 item" href="{{url('chitietsanpham/'.$value->ID)}}">
                                <div class="card">
                                    <img width="150" height="180" class="card-img-top" src="/cuulongseed/public/Hinh-Anh/San-Pham/{{$value->HinhAnh}}" alt="{{$value->TenSanPham}}">
                                    <div class="card-body">
                                        <h3 class="card-text">{{$value->TenSanPham}}</h3>
                                        <p class="card-text price">{{$value->GiaSanPham}}  đ</p>
                                    </div>
                                    <div class="info">
                                        <span class="name-info"><h5>{{$value->TenSanPham}}</h5></span>
                                        <span class="price-info">
                                            <strong>Giá: {{$value->GiaSanPham}} đ</strong>
                                        </span>
                                        <span style="text-align:left;">{!!html_entity_decode($value->MoTa)!!}</span>
                                    </div>
                                </div>
                            </a>
                            @endforeach
                        </div> <!-- end 1 row -->
                        <div class="float-right mr-4">
                            {!! $product->render() !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
