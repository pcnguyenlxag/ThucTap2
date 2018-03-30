<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <!-- <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Đăng nhập</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/css/administrator.css')}}">
    <link rel="stylesheet" href="{{asset('/css/simple-line-icons.css')}}">
    <script type="text/javascript" src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>FontAwesomeConfig = { searchPseudoElements: true }</script>
    <script type="text/javascript" src="{{asset('js/fontawesome-all.js')}}"></script>
</head>
<body class="app sidebar-mini rtl">
    <section class="material-half-bg">
        <div class="cover"></div>
    </section>
    <section class="login-content">
        <div class="login-box">
            <form class="login-form" action="{{url('login')}}" method="post">
                @if($errors->has('errorlogin'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    {{$errors->first('errorlogin')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                {{ csrf_field() }}
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>ĐĂNG NHẬP</h3>
                <div class="form-group">
                    <label for="email" class="control-label">EMAIL ĐĂNG NHẬP</label>
                    <input class="form-control py-2" id="email" name="email" type="text"  aria-describedby="emailHelp"  placeholder="Email" autofocus>
                    @if($errors->has('email'))
                    <small id="emailHelp" class="form-text text-muted" style="color:red">{{$errors->first('email')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password" class="control-label">MẬT KHẨU</label>
                    <input class="form-control py-2" id="password" name="password" type="password" placeholder="Password">
                    @if($errors->has('password'))
                    <small class="form-text text-muted" style="color:red">{{$errors->first('password')}}</small>
                    @endif
                </div>
                <div class="form-group">
                    <div class="utility">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="exampleCheck1">
                            <label class="form-check-label mb-2" for="exampleCheck1">Ghi nhớ đăng nhập</label>
                        </div>
                        <p class="semibold-text mb-2"><a href="#" data-toggle="flip">Forgot Password ?</a></p>
                    </div>
                </div>
                <div class="form-group btn-container">
                    <button type="submit" class="btn btn-primary btn-block"><i class="fas fa-sign-in-alt"></i> ĐĂNG NHẬP</button>
                </div>
            </form>
            <form class="forget-form" action="index.html">
                <h3 class="login-head"><i class="fa fa-lg fa-fw fa-lock"></i>Forgot Password ?</h3>
                <div class="form-group">
                    <label class="control-label">EMAIL</label>
                    <input class="form-control" type="text" placeholder="Email">
                </div>
                <div class="form-group btn-container">
                    <button class="btn btn-primary btn-block"><i class="fa fa-unlock fa-lg fa-fw"></i>RESET</button>
                </div>
                <div class="form-group mt-3">
                    <p class="semibold-text mb-0"><a href="#" data-toggle="flip"><i class="fa fa-angle-left fa-fw"></i> Back to Login</a></p>
                </div>
            </form>
        </div>
    </section>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="{{asset('js/jquery-3.3.1.js')}}"></script>
    <script src="{{asset('js/popper.js')}}"></script>
    <script src="{{asset('js/bootstrap.js')}}"></script>
    <script src="{{asset('js/admin.js')}}"></script>
    <script src="{{asset('js/pace.min.js')}}"></script>
    <script src="{{asset('js/customadmin.js')}}"></script>
    <script type="text/javascript">
     // Login Page Flipbox control
     $('.login-content [data-toggle="flip"]').click(function() {
       $('.login-box').toggleClass('flipped');
       return false;
     });
   </script>

</body>
</html>
