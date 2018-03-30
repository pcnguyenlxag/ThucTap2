<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\MessageBag;

class AuthController extends Controller
{
    public function getLogin(){
        return view('authentication.login');
    }
    public function postLogin(Request $request){
        $rules = [
            'email'=>'required|email',
            'password'=>'required|min:6'
        ];
        $messages = [
                'email.required'=>'Email là trường bắt buộc',
                'email.email'=>'Email không đúng định dạng',
                'password.required'=>'Mật khẩu là trường bắt buộc',
                'password.min'=>'Mật khẩu phải trên 6 kí tự',
        ];
        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        else {
            $email = $request->input('email');
            $password = $request->input('password');

            if(Auth::attempt(['email'=>$email, 'password'=>$password])){
                return redirect(Route('admincuulong'));
            }
            else {
                $errors = new MessageBag(['errorlogin'=>'Email hoặc mật khẩu không đúng']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }
    public function logOut(){
        Auth::logout();
        return redirect(Route('login'));
    }


   // public function postRegister_KH(Request $request)
   // {
   //     $rules = [
   //         'Email' =>'required|unique:KhachHang',
   //         'PassWord' => 'required|min:6',
   //         'TenKhachHang' =>'required',
   //         'DiaChi' =>'required',
   //         'NgaySinh' =>'required',
   //         'GioiTinh' =>'required',
   //         'SoDienThoai' => 'required|numeric|max:13|min:9',
   //     ];
   //     $messages = [
   //         'TenKhachHang.required' => 'Tên đăng nhập là trường bắt buộc',
   //         'PassWord.required' => 'Mật khẩu là trường bắt buộc',
   //         'PassWord.min' => 'Mật khẩu phải chứa ít nhất 6 ký tự',
   //         'SoDienThoai.required' => 'Bạn chưa nhập Số Điện Thoại',
   //         'SoDienThoai.max' => 'Số Điện Thoại không hợp lệ',
   //         'SoDienThoai.min' => 'Số Điện Thoại không hợp lệ',
   //         'DiaChi.required' => 'Bạn chưa nhập Địa Chỉ'
   //     ];
   //     $validator = Validator::make($request->all(), $rules, $messages);
   //
   //     if ($validator->fails()) {
   //         return redirect()->back()->withErrors($validator)->withInput();
   //     }
   //     $khachhang = KhachHang::create([
   //         'TenKhachHang' => $request->TenKhachHang,
   //         'PassWord' => bcrypt($request->PassWord),
   //         'Email' => $request->Email,
   //         'NgaySinh' => $request->NgaySinh,
   //         'GioiTinh' => $request->GioiTinh,
   //         'DiaChi' => $request->DiaChi,
   //         'created_at' => time()
   //     ]);
   //     if($nguoidung) {
   //         return redirect(Route('login'))->with(['login'=> 'Đăng ký thành công']);
   //     }
   //     return redirect()->back()->withInput($request->all)->withErrors(['error'=> 'Đăng nhập thất bại']);
   // }
}
