<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\DanhMuc;
use App\Slider;

class HomeController extends Controller
{
    public function getProductIndex(){
        $subslider=Slider::where([['TrangThai',1],['TenSlide','Sub-Slider']])->get();
        $banner=Slider::where([['TrangThai',1],['TenSlide','Banner']])->get();
        $slider=Slider::where([['TrangThai',1],['TenSlide','Slider']])->get();
        $product=SanPham::orderBy('ID', 'desc')->paginate(10);
        return view('Home.indexHome')->with(['product'=>$product, 'slider'=>$slider, 'subslider'=>$subslider, 'banner'=>$banner]);
    }
    public function getProductByID($id){
        $product=SanPham::where('ID','=', $id)->select('sanpham.*')->first();
        $sanpham = SanPham::orderByRaw('RAND()')->take(3)->get();

        return view('Home.SanPham.productDetail', ['product'=>$product, 'sanpham'=>$sanpham]);
    }
    public function getCatelory(){
        $catelory=DanhMuc::orderBy('ID', 'desc')->paginate(10);
        return view('Home.DanhMuc.danhmuc', ['catelory'=>$catelory]);
    }
    public function getCateloryByID($id){
        $catelory=SanPham::where('IdDanhMuc','=', $id)->paginate(10);
        return view('Home.DanhMuc.danhmucchitiet', ['catelory'=>$catelory]);
    }
}
