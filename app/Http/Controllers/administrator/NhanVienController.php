<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Validator;
use Auth;

class NhanVienController extends Controller
{
    public function getNhanVien()
    {
        if(Auth::user()->level == 1)
        {
            $nhanvien = User::paginate(10);
            return view('administrator.NhanVien.indexNhanVien')->with(['nhanvien' => $nhanvien]);
        }
        abort(404, 'không tìm thấy trang');
    }

    public function getThemNhanVien()
    {
        if(Auth::user()->level == 1)
        {
        return view('administrator.NhanVien.ThemNhanVien');
        }
        abort(404, 'không tìm thấy trang');
    }

    public function postThemNhanVien(Request $request)
   {
       $rules = [
           'name' =>'required',
           'email' =>'required|unique:users',
           'address' =>'required',
           'phone' =>'required',
           'level' =>'required',
       ];
       $messages = [
           'name.required' => 'Bạn chưa nhập tên nhân viên',
           'phone.required' => 'Bạn chưa nhập số điện thoại nhân viên',
           'address.required' => 'Bạn chưa nhập địa chỉ nhân viên',
       ];
       $validator = Validator::make($request->all(), $rules, $messages);

       if ($validator->fails()) {
           return redirect()->back()->withErrors($validator)->withInput();
       }
       $nhanvien = User::create([
           'password' => bcrypt(111111),
           'email' => $request->email,
           'name' => $request->name,
           'level' => $request->level,
           'phone' => $request->phone,
           'address' =>$request->address,
           'created_at' => time(),
           'updated_at' => null,
       ]);
       if($nhanvien) {
           return redirect(Route('nhanvien'));
       }
       return redirect()->back()->withErrors(['errors' => ['Thêm nhân viên không thành công']]);
   }
   public function getSuaNhanVien(Request $request)
   {
       $nhanvien = User::find($request->id);
       if($nhanvien && Auth::user()->id !=$request->id )
       {
           if($nhanvien->level === 1)
           {
               User::where('id','=', $request->id)->update(['level' =>0]);
           }
           if($nhanvien->level === 0)
           {
               // DB::table('users')->where('id', $request->$id)->update(['level' => 1]);
                 User::where('id','=', $request->id)->update(['level' =>1]);
           }
           return redirect()->back();
       }
       else
       return redirect()->back()->withErrors(['errors' => ['Bạn không thể thay đổi quyền hạn chính mình']]);
   }

    public function getXoaNhanVien(Request $request)
    {
        $nhanvien = User::find($request->id);
        if($nhanvien && Auth::user()->id !=$request->id)
        {
            $nhanvien->delete();
            return redirect(Route('nhanvien'));
        }
        return redirect()->back()->withErrors(['errors' => ['Không thể xóa chính mình']]);
    }
}
