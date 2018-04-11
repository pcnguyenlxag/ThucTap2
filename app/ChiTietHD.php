<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietHD extends Model
{
    protected $table = 'chitiethoadon';
    protected $primaryKey = 'IDChiTiet';
    protected $filltable = ['IDChiTiet', 'IDHoaDon', 'IDSanPham', 'SoLuongMua', 'created_at', 'updated_at'];

    public function chitiethoadon(){
        return $this->belongsTo('App\HoaDon');
    }
}
