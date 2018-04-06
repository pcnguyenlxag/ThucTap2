<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
     <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title','Quản lý Bán Hàng')</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/css/administrator.css')}}">
    <link rel="stylesheet" href="{{asset('/css/simple-line-icons.css')}}">
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script type="text/javascript" src="{{asset('js/fontawesome-all.js')}}"></script>
</head>
<body class="app sidebar-mini rtl">
    <header class="app-header">
        <a class="app-header__logo" href="{{Route('admincuulong')}}">Quản lý cửa hàng</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle icon-menu" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>
        <!-- Navbar Right Menu-->
        <ul class="app-nav">
            <!-- User Menu-->
            <li class="dropdown"><a class="app-nav__item" href="#" data-toggle="dropdown" aria-label="Open Profile Menu"><i class="fa fa-user fa-lg"></i></a>
                <ul class="dropdown-menu settings-menu dropdown-menu-right">
                    <li><a class="dropdown-item" href="{{Route('suataikhoan')}}"><i class="fa fa-user fa-lg"></i> Profile</a></li>
                    <li><a class="dropdown-item" href="{{url('logout')}}"><i class="icon-logout"></i> Logout</a></li>
                </ul>
            </li>
        </ul>
    </header>
    <!-- Sidebar menu-->
    <div class="app-sidebar__overlay" data-toggle="sidebar"></div>
    <aside class="app-sidebar">
        <div class="app-sidebar__user">
            <div class="ml-3">
                <p class="app-sidebar__user-name">{{Auth::user()->name}}</p>
                <p class="app-sidebar__user-designation">
                    @if(Auth::user()->level == 1)
                         Administrator
                     @else
                         Author
                     @endif
                </p>
            </div>
        </div>
        <ul class="app-menu">
            <li><a class="app-menu__item" href="#"><i class="app-menu__icon fas fa-paint-brush pr-1"></i><span class="app-menu__label">QL Đơn Hàng</span></a></li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon fa fa-laptop pr-1"></i><span class="app-menu__label">QL Sản Phẩm</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{Route('danhmuc')}}"><i class="fas fa-align-left pr-1"></i> Danh Mục Sản Phẩm</a></li>
                    <li><a class="treeview-item" href="{{Route('sanpham')}}"><i class="fab fa-product-hunt pr-1"></i> Sản Phẩm</a></li>
                </ul>
            </li>
            <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i class="app-menu__icon far fa-images pr-1"></i><span class="app-menu__label">QL Trang</span><i class="treeview-indicator fa fa-angle-right"></i></a>
                <ul class="treeview-menu">
                    <li><a class="treeview-item" href="{{Route('suatrang')}}"><i class="fas fa-align-left pr-1"></i> Slider</a></li>
                    <li><a class="treeview-item" href="{{Route('getsubtrang')}}"><i class="fab fa-product-hunt pr-1"></i> Quảng Cáo</a></li>
                    <li><a class="treeview-item" href="{{Route('getbanner')}}"><i class="far fa-calendar pr-1"></i> Banner</a></li>
                </ul>
            </li>
            @if(Auth::user()->level == 1)
                        <li><a class="app-menu__item" href="{{Route('nhanvien')}}"><i class="app-menu__icon far fa-user pr-1"></i><span class="app-menu__label">QL Nhân Viên</span></a></li>
            @endif
        </ul>
    </aside>
    <main class="app-content">

            @yield('content')

    </main>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <script src="{{asset('js/customadmin.js')}}"></script>

</body>
</html>
