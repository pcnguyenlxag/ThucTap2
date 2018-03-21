<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DanhMuc extends Model
{
    protected $table = 'danhmucsanpham';
    protected $primaryKey = 'ID';
    protected $filltable = ['ID','TenDanhMuc','updated_at','created_at','MoTa','HinhAnh','TrangThai'];
    public $timestamps = true;

  //   public function sanpham(){
  //   return $this->hasMany('App\Photo');
  // }
}
