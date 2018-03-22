@extends('layouts.apps')
@section('content')
<div class="product-container my-2">
    <div class="container"  style="display: flex; flex:flex-wrap">
        <div class="col-md-4">
            <div class="product-image">
                <img src="http://via.placeholder.com/250x150" alt="">
            </div>
        </div>
        <div class="col-md-5">
            <div class="product-detail">
                <div class="product-detail-intro b-footer">
                    <h1 class="product-detail-name">{{$product->TenSanPham}}</h1>
                    <h2 class="product-detail-price">{{$product->GiaSanPham}} đ</h2>
                </div>
                <div class="product-detail-descriptions">
                    <p>
                        {{$product->MoTa}}
                    </p>
                </div>
                <div class="product-detail-shopping">
                    <div class="product-detail-amount" style="text-align:left;">
                        <label style="font-weight:bold" for="">Số Lượng: </label>
                        <input class="py-1 mb-3" style="width:70px;" type="number" name="" min="1" value="1">
                    </div>
                    <div class="product-detail-cart mb-3">
                        <div class="btn btn-primary text-uppercase"><i class="fas fa-cart-plus"></i> Thêm giỏ hàng</div>
                        <div class="btn btn-buy text-uppercase px-5" style="font-weight:bold;">Mua ngay</div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="sidebar-card">
                <h1 class="product-title">sản phẩm nổi bật</h1>
                <ul class="product-item mb-0">
                    <li class="content my-1">
                        <a href="#" class="link">
                            <div class="col-md-5 col-sm-5 col-xs-5 px-0">
                                <img class="sidebar-img" src="images/kho-qua.jpg" alt="">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 px-1 py-3">
                                <div class="sidebar-title">Giống bắp siêu hạt</div>
                                <div class="sidebar-price">5.000 đ</div>
                            </div>
                        </a>
                    </li>
                    <li class="content my-1">
                        <a href="#" class="link">
                            <div class="col-md-5 col-sm-5 col-xs-5 px-0">
                                <img class="sidebar-img" src="images/kho-qua.jpg" alt="">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 px-1 py-3">
                                <div class="sidebar-title">Giống bắp siêu hạt</div>
                                <div class="sidebar-price">5.000 đ</div>
                            </div>
                        </a>
                    </li>
                    <li class="content my-1">
                        <a href="#" class="link">
                            <div class="col-md-5 col-sm-5 col-xs-5 px-0">
                                <img class="sidebar-img" src="images/kho-qua.jpg" alt="">
                            </div>

                            <div class="col-md-7 col-sm-7 col-xs-7 px-1 py-3">
                                <div class="sidebar-title">Giống bắp siêu hạt</div>
                                <div class="sidebar-price">5.000 đ</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="container" style="display:flex; flex: flex-wrap;">
        <div class="col-md-9">
            <div class="product-intro">
                <h1 class="product-title">chi tiết sản phẩm</h1>
            </div>
            <p>{{$product->ThuocTinh}}</p>
        </div>
        <div class="col-md-3">
            <div class="sidebar-card">
                <h1 class="product-title">sản phẩm nổi bật</h1>
                <ul class="product-item mb-0">
                    <li class="content my-1">
                        <a href="#" class="link">
                            <div class="col-md-5 col-sm-5 col-xs-5 px-0">
                                <img class="sidebar-img" src="images/kho-qua.jpg" alt="">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 px-1 py-3">
                                <div class="sidebar-title">Giống bắp siêu hạt</div>
                                <div class="sidebar-price">5.000 đ</div>
                            </div>
                        </a>
                    </li>
                    <li class="content my-1">
                        <a href="#" class="link">
                            <div class="col-md-5 col-sm-5 col-xs-5 px-0">
                                <img class="sidebar-img" src="images/kho-qua.jpg" alt="">
                            </div>
                            <div class="col-md-7 col-sm-7 col-xs-7 px-1 py-3">
                                <div class="sidebar-title">Giống bắp siêu hạt</div>
                                <div class="sidebar-price">5.000 đ</div>
                            </div>
                        </a>
                    </li>
                    <li class="content my-1">
                        <a href="#" class="link">
                            <div class="col-md-5 col-sm-5 col-xs-5 px-0">
                                <img class="sidebar-img" src="images/kho-qua.jpg" alt="">
                            </div>

                            <div class="col-md-7 col-sm-7 col-xs-7 px-1 py-3">
                                <div class="sidebar-title">Giống bắp siêu hạt</div>
                                <div class="sidebar-price">5.000 đ</div>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection