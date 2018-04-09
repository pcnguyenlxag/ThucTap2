<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SanPham;
use Validator;

class GioHangController extends Controller
{

    public function getGioHangSanPham(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'soluongsp' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $sanpham = SanPham::find($request->id);
        // dd($sanpham->SoLuong, $request->soluongsp);
        // if($sanpham->SoLuong >= $request->soluongsp)
        // {
            // if ($request->session()->has($request->id))
            // {
            //     $value = $request->session()->get($request->id);
            //
            //     $soluong = $value + $request->soluongsp;
            //     dd($request->id, $value, $soluong, $request->soluongsp);
            //     $request->session()->put($request->id, $soluong);
            //     $value = $request->session()->get($request->id);
            //     dd($value);
            // }
            // $request->session()->put($request->id, $request->soluongsp);
            // return redirect()->back()->withErrors(['errors' => ['Sản phẩm them thanh cong']]);
        }
        // else
        // return redirect()->back()->withErrors(['errors' => ['Sản phẩm không đủ']]);
    }

}
