<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use Validator;
use Cart;

class GioHangController extends Controller
{

    public function postGioHangSanPham(Request $request)
    {
        $sanpham = SanPham::find($request->id);
        if($sanpham->SoLuong < $request->soluongsp)
            return redirect()->back()->withErrors(['errors' => ['Số lượng hiện tại không đủ']]);
        Cart::add(['id' => $sanpham->ID, 'name' => $sanpham->TenSanPham, 'qty' => $request->soluongsp, 'price' => $sanpham->GiaSanPham, 'options' => ['img' => $sanpham->HinhAnh]]);
        return redirect()->back()->withErrors(['errors' => ['Thêm sản phẩm thành công']]);
    }
    public function getGioHang()
    {
        $content = Cart::content();
        return view('Home.GioHang.indexGioHang')->with(['content' => $content]);
    }

}
