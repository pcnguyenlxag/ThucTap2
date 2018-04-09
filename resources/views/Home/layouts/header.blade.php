@section('header')
<header>
    <div class="menu-top">
        <div class="container">
            <div class="row" style="height:120px;">
                <div class="logo my-auto">
                    <img src="/cuulongseed/public/Hinh-Anh/Logo/banner.jpg" alt="logo cuu long" style="height:120px; width:660px;" width="100%">
                </div>
                <div class="menu-top-left">
                    <ul title="Giỏ Hàng" class=" menu-top-block">
                        <li class="menu-top-content">
                            <a class="color-top" href="{{Route('giohang')}}">
                                <div class="cart-item">
                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                    <span style="color: black;">2</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul class=" menu-top-block">
                        <li>
                            <a title="Đăng Nhập" href="{{url('login')}}">Đăng Nhập</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #C4E53833; padding:0;">
        <div class="container">
            <!-- <a class="navbar-brand" href="#">Navbar</a> -->
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item {{ Request::is('/') ? 'active':''}}">
                        <a class="nav-link" href="/">Trang Chủ<span class="sr-only">(current)</span></a>
                    </li>
                    <li class="nav-item {{ Request::is('danhmuc') ? 'active':''}}">
                        <a class="nav-link" href="danhmuc">Danh Mục Sản Phẩm</a>
                    </li>
                    <li class="nav-item  {{ Request::is('#') ? 'active':''}}">
                        <a class="nav-link" href="#">Tuyển Dụng</a>
                    </li>
                    <li class="nav-item  {{ Request::is('#') ? 'active':''}}">
                        <a class="nav-link" href="#">Tin Tức CuuLongSEED</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
@show
