@extends('Home.layouts.apps')
@section('title','Đặt Hàng - CUULONGSEED')
@section('content')
<div class="container">
    <div class="app-title">
        <div>
            <h1>Xác nhận thông tin</h1>
        </div>
    </div>
    @foreach($errors->all() as $err)
    <div class="alert alert-danger" role="alert">
        {{$err}}
    </div>
    @endforeach
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <div style="max-width:60%; margin:0 auto">
    <form  class="product-detail" method="post" enctype="multipart/form-data">
           {{ csrf_field() }}
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Tên khách hàng</label>
                <input type="text" class="form-control" id="tenkh" name="tenkh" placeholder="Nhập tên khách hàng">
            </div>
            <div class="form-group col-md-6">
                <label for="inputPassword4">Số điện thoại</label>
                <input type="text" class="form-control" id="sdtkh" name="sdtkh" placeholder="Nhập SDT">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputEmail4">Email</label>
                <input type="text" class="form-control"id="email" name="email" placeholder="Nhập Email">
            </div>
            <div class="form-group col-md-4">
                <label for="inputState">Giới tính</label>
                <select name="giotinhkh" id="giotinhkh" class="form-control">
                    <option value="0">
                        Nam
                    </option>
                    <option value="1">
                        Nữ
                    </option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="inputAddress">Địa chỉ</label>
            <input type="text" class="form-control" name="diachikh" id="diachikh" placeholder="Nhập địa chỉ">
        </div>
        <button type="submit" class="btn btn-primary">Xác Nhận</button>
    </form>
</div>
</div>
@endsection
