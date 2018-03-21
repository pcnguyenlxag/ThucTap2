@section('header')
<header>
    <div class="menu-top">
        <div class="container">
            <div class="row" style="height:120px;">
                <div class="logo my-auto">
                    <img src="images/logo2.png" alt="logo cuu long" width="100%">
                </div>
                <div class="menu-top-left">
                    <ul title="Giỏ Hàng" class=" menu-top-block">
                        <li class="menu-top-content">
                            <a class="color-top" href="">
                                <div class="cart-item">
                                    <i class="fas fa-shopping-cart fa-2x"></i>
                                    <span style="color: black;">2</span>
                                </div>
                            </a>
                        </li>
                    </ul>
                    <ul title="Đăng Nhập" class=" menu-top-block">
                        <li>
                            <a class="color-top" href="{{url('login')}}">
                                <i class="fas fa-sign-in-alt fa-2x"></i>
                            </a>
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
                    <li class="nav-item {{ Request::is('danh-muc-san-pham') ? 'active':''}}">
                        <a class="nav-link" href="danh-muc-san-pham">Danh Mục Sản Phẩm</a>
                    </li>
                    <li class="nav-item  {{ Request::is('#') ? 'active':''}}">
                        <a class="nav-link" href="#">Tuyển Dụng</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Khác
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#">Khổ qua</a>
                            <a class="dropdown-item" href="#">Mướp</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Sen</a>
                        </div>
                    </li>
                </ul>
                <!-- <form class="form-inline my-2 my-lg-0">
                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                </form> -->
            </div>
        </div>
    </nav>
</header>
@show
