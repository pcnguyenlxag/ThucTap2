<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slide';
    protected $primaryKey = 'ID';
    protected $filltable = ['ID', 'TenSlide', 'HinhAnh', 'created_at', 'updated_at', 'TrangThai'];

    public $timestamps = true;
}
