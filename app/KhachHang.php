<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table = 'khachhang';
    protected $primaryKey = 'ID';
    protected $filltable = ['ID', 'Email', 'TenKhachHang', 'DiaChi', 'GioiTinh', 'SoDienThoai', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function khachhang(){
    return $this->hasMany('App\HoaDon');
  }
}
