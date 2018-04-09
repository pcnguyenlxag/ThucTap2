<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class HoaDon extends Model
{
    protected $table = 'hoadon';
    protected $primaryKey = 'ID';
    protected $filltable = ['IDUser', 'IDKhachHang', 'TrangThai', 'TongTien', 'ID', 'created_at', 'updated_at'];
    public $timestamps = true;

    public function hoadon(){
    return $this->belongTo('App\KhachHang');
  }
}
