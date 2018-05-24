<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use App\KhachHang;
use App\HoaDon;
use App\ChiTietHD;
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
    public function getXoaSanPhamGioHang(Request $request)
    {
        Cart::remove($request->id);
        return redirect()->back();
    }
    public function getCapNhatGioHang(Request $request)
    {
        if(Request::ajax())
            echo "oke";
        // dd($request->soluong);
        // Cart::update($request->id,$request->soluong);
        // return view('Home.GioHang.indexGioHang')->with(['content' => $content]);
    }
    public function getDatHang()
    {
        return view('Home.GioHang.DatHang');
    }
    public function postDatHang(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tenkh' => 'required',
            'sdtkh' =>'required|numeric',
            'email' => 'required',
            'giotinhkh' =>'required',
            'diachikh' =>'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $khachhang= new KhachHang();
        $khachhang->TenKhachHang = $request->tenkh;
        $khachhang->Email = $request->email;
        $khachhang->DiaChi = $request->diachikh;
        $khachhang->GioiTinh = $request->giotinhkh;
        $khachhang->SoDienThoai = $request->sdtkh;
        $khachhang->created_at = time();
        $khachhang->updated_at = null;
        $khachhang->save();
        if(!$khachhang)
        {
            return redirect()->back()->withErrors(['errors' => ['Khách hàng thêm không thành công']]);
        }

        $hoadon= new HoaDon();
        $hoadon->IDKhachHang = $khachhang->ID;
        $hoadon->TrangThai = 0;
        $hoadon->TongTien = str_replace(',', '', Cart::subtotal());
        $hoadon->created_at = time();
        $hoadon->updated_at = null;
        $hoadon->save();
        if(!$hoadon)
        {
            return redirect()->back()->withErrors(['errors' => ['Hoa đơn thêm không thành công']]);
        }
        $content = Cart::content();
        if(count($content)>0)
        {
            foreach ($content as $item) {
                $chitiet= new ChiTietHD();
                $chitiet->IDHoaDon = $hoadon->ID;
                $chitiet->IDSanPham = $item->id;
                $chitiet->SoLuongMua = $item->qty;
                $chitiet->created_at = time();
                $chitiet->updated_at = null;
                $chitiet->save();
            }
            if(!$chitiet)
            {
                return redirect()->back()->withErrors(['errors' => ['Chi tiết thêm không thành công']]);
            }
        }
        Cart::destroy();
        return redirect(Route('homepage'));
    }
}
