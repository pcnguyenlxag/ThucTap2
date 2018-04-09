@extends('Home.layouts.apps')
@section('title','Chi Tiết Sản Phẩm - CUULONGSEED')
@section('content')
<div class="product-container my-2">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @foreach($errors->all() as $err)
                <div class="alert alert-success" role="alert">
                    {{$err}}
                </div>
                @endforeach
            </div>
            <div class="col-md-9">
                <form method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="col-md-12" style="display:flex;">
                        <div class="col-md-5">
                            <div class="product-image">
                                <img src="/cuulongseed/public/Hinh-Anh/San-Pham/{{$product->HinhAnh}}" alt="">
                            </div>
                        </div>
                        <div class="col-md-7">
                            <div class="product-detail">
                                <div class="product-detail-intro b-footer">
                                    <h1 class="product-detail-name">{{$product->TenSanPham}}</h1>
                                    <h2 class="product-detail-price">{{$product->GiaSanPham}} đ</h2>
                                </div>
                                <div class="product-detail-descriptions">
                                    <p>
                                        {!!html_entity_decode($product->MoTa)!!}
                                    </p>
                                </div>
                                <div class="product-detail-shopping">
                                    <div class="product-detail-amount" style="text-align:left;">
                                        <label style="font-weight:bold" for="">Số Lượng: </label>
                                        <input type="number" id="soluongsp" name="soluongsp" style="width:70px;" value="1"  min="1" value="1">
                                    </div>
                                    <div class="product-detail-cart mb-3">
                                        <button class="btn btn-primary text-uppercase text-white" type="submit"><i class="fas fa-cart-plus"></i> Thêm giỏ hàng</button>
                                        <a class="btn btn-buy text-uppercase px-5 text-white" style="font-weight:bold;">Mua ngay</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="product-intro">
                            <h1 class="product-title">chi tiết sản phẩm</h1>
                        </div>
                        <div class="product-detail">
                            {!!html_entity_decode($product->ThuocTinh)!!}
                        </div>
                    </div>
                </form>
            </div>

            <!-- ********************************** -->
            <div class="col-md-3" style="display:flex; flex-direction:column">
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

</div>
@endsection
