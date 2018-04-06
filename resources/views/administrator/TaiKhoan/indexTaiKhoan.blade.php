@extends('administrator.layouts.app')
@section('title','Quản lý chủ đề')
@section('content')
<div class="app-title">
    <div>
        <h1><i class="fas fa-address-card pr-2"></i>Quản lý tài khoản</h1>
        <p>Bạn có thể thay đổi thông tin của mình</p>
    </div>
</div>
@foreach($errors->all() as $err)
<div class="alert alert-danger" role="alert">
    {{$err}}
</div>
@endforeach
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row user">
    <div class="col-md-3">
        <div class="tile p-0">
            <ul class="nav flex-column nav-tabs user-tabs">
                <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab">Thông tin cá nhân</a></li>
                <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab">Đổi mật khẩu</a></li>
            </ul>
        </div>
    </div>
    <div class="col-md-9">
        <div class="tab-content">
            <div class="tab-pane active" id="user-timeline">
                <div class="tile user-settings">
                    <h4 class="line-head">Thông tin cá nhân</h4>
                    <form method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row mb-4">
                            <div class="col-md-4">
                                <label>Họ tên</label>
                                <input name="name" id="name" class="form-control" type="text" value="@if(isset($taikhoan)) {{$taikhoan->name}} @endif">
                            </div>
                            <div class="col-md-4">
                                <label>Số điện thoại</label>
                                <input name="phone" id="phone" class="form-control" type="text" value="@if(isset($taikhoan)) {{$taikhoan->phone}} @endif">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <label>Email</label>
                                <input name="email" readonly  id="email" class="form-control-plaintext" type="text" value="@if(isset($taikhoan)) {{$taikhoan->email}} @endif">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-4">
                                <label>Địa chỉ</label>
                                <input name="address" id="address" class="form-control" type="text" value="@if(isset($taikhoan)) {{$taikhoan->address}} @endif">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Lưu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="tab-pane fade" id="user-settings">
                <div class="tile user-settings">
                    <h4 class="line-head">Đổi mật khẩu</h4>
                    <form method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="row">
                            <div class="col-md-8 mb-4">
                                <label>Mật khẩu cũ</label>
                                <input name="mkc" id="mkc" class="form-control" type="password">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-4">
                                <label>Mật khẩu mới</label>
                                <input name="nhapmk" id="nhapmk" class="form-control" type="password">
                            </div>
                            <div class="clearfix"></div>
                            <div class="col-md-8 mb-4">
                                <label>Nhập lại khẩu</label>
                                <input name="nhaplaimk" id="nhaplaimk" class="form-control" type="password">
                            </div>
                        </div>
                        <div class="row mb-10">
                            <div class="col-md-12">
                                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Đổi mật khẩu</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
