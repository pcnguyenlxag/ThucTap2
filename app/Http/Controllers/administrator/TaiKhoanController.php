<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;
use Hash;

class TaiKhoanController extends Controller
{
    public function getTaiKhoan() {
        $taikhoan = User::find(Auth::user()->id);
        return view('administrator/TaiKhoan/indexTaiKhoan')->with(['taikhoan'=>$taikhoan]);
    }
    public function postSuaTaiKhoan(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'phone' => 'required|numeric',
            'name' => 'required',
            'address' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $taikhoan = User::find(Auth::user()->id);
        $taikhoan->name = $request->name;
        $taikhoan->phone = $request->phone;
        $taikhoan->address =$request->address;
        $taikhoan->save();
        if($taikhoan)
        {
            return redirect(Route('suataikhoan'));
        }
        else
        return redirect()->back()->withErrors(['errors' => ['Sửa tài khoản không thành công']]);
    }
    public function postDoiMK(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'mkc' => 'required',
            'nhapmk' => 'required|min:6',
            'nhaplaimk' => 'required|min:6',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $taikhoan = User::find(Auth::user()->id);
        $password = $request->mkc;
        // dd (Hash::check($password, $taikhoan->password));
        if(Hash::check($password, $taikhoan->password))
        {
            if($request->nhapmk === $request->nhaplaimk)
            {
                $taikhoan->password=bcrypt($request->nhapmk);
                $taikhoan->save();
                Auth::logout();
                return redirect(Route('login'));
            }
            else
                return redirect()->back()->withInput()->withErrors(['errors' => ['Một trong 2 mật khẩu mới không khớp']]);
        }
        else
        return redirect()->back()->withInput()->withErrors(['errors' => ['Mật khẩu không đúng']]);
    }
}
