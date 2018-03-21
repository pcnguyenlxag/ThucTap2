<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('/css/simple-line-icons.css')}}">
    <link rel="stylesheet" href="{{asset('/css/custom.css')}}">

    <script type="text/javascript" src="js/fontawesome-all.js">

    </script>
    <title>Thực tập</title>
</head>
<body>
    <div class="container">
        <div class="login-container">
            <div class="col-md-4">
                <img src="images/logo.jpg" alt="" width="100%">
            </div>
            <div class="col-md-8">
                <form class="" action="{{url('login')}}" method="post">
                    @if($errors->has('errorlogin'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{$errors->first('errorlogin')}}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @endif
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="email">Tên Đăng Nhập</label>
                        <input type="user" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email Đăng Nhập" value="{{old('email')}}">
                        @if($errors->has('email'))
                            <p style="color:red">{{$errors->first('email')}}</p>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Mật Khẩu">
                        @if($errors->has('password'))
                            <p style="color:red">{{$errors->first('password')}}</p>
                        @endif
                    </div>
                    <div class="form-check">
                        <input type="checkbox" class="form-check-input" id="Check">
                        <label class="form-check-label" for="Check">Check me out</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="js/jquery-3.3.1.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.js"></script>
</body>
</html>
