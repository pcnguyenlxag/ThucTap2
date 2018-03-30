<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table = 'sanpham';
    protected $primaryKey = 'ID';
    protected $filltable = ['ID', 'TenSanPham', 'HinhAnh', 'MoTa', 'IdDanhMuc', 'updated_at', 'GiaSanPham', 'ThuocTinh', 'created_at', 'SoLuong'];
    public $timestamps = true;
}
