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
}
