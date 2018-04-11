<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DanhMuc;
use App\SanPham;
use Validator;

class DanhMucController extends Controller
{
    public function index()
    {
        $danhmuc = DanhMuc::paginate(5);
        return view('administrator.DanhMucSanPham.indexDanhMuc')->with(['danhmuc' => $danhmuc]);
    }
    public function getThemDanhMuc()
    {
        return view('administrator.DanhMucSanPham.ThemDanhMuc');
    }
    public function postThemDanhMuc(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'TenDanhMuc' => 'required',
            'MoTa' => 'required',
            'HinhAnh' =>'image|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $danhmuc= new DanhMuc();
        $danhmuc->TenDanhMuc = $request->TenDanhMuc;
        $danhmuc->MoTa = htmlentities($request->MoTa);
        $danhmuc->TrangThai = 1;
        $danhmuc->created_at = time();
        $danhmuc->updated_at = null;
        if($request->hasFile('HinhAnh'))
        {
            $ext = ['gif','jpg','jpge','png','svg'];
            //get filename with extension
            $fileNameExt= $request->file('HinhAnh')->getClientOriginalName();
            //get file name
            $filename = pathinfo($fileNameExt, PATHINFO_FILENAME);
            // Get extension
            $extension = $request->file('HinhAnh')->getClientOriginalExtension();
            if(!in_array($extension,$ext))
            {
                return redirect()->back()->withErrors(['errors' => ['Định dạng ảnh không đúng']]);
            }
            // Create new filename
            $filenameToStore = $filename.'_'.time().'.'.$extension;
            // Uplaod image
            // $path= $request->file('HinhAnh')->storeAs(public_path('Hinh-Anh'), $filenameToStore);
            $request->HinhAnh->move(public_path('Hinh-Anh'),$filenameToStore);
            $danhmuc->HinhAnh = $filenameToStore;
        }
        else {
            $danhmuc->HinhAnh = 'noimage.jpg';
        }
        $danhmuc->save();
        if($danhmuc)
        {
            return redirect(Route('danhmuc'));
        }
        else
            return redirect()->back()->withErrors(['errors' => ['Danh mục thêm không thành công']]);
    }
    public function getSuaDanhMuc(Request $request)
    {
        $danhmuc = DanhMuc::where('TrangThai',1)->get();
        $danhmucid = DanhMuc::where('ID',$request->id)->first();
        if(! $danhmucid) {
            return redirect()->back()->withErrors(['errors' => ['Không tìm thấy danh mục']]);
        }
        return view('administrator.DanhMucSanPham.ThemDanhMuc')->with(['danhmuc'=>$danhmuc,'danhmucid'=>$danhmucid]);
    }
    public function postSuaDanhMuc(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'TenDanhMuc' => 'required',
            'MoTa' => 'required',
            'HinhAnh' =>'image|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $danhmuc = DanhMuc::find($request->id);
        if($danhmuc)
        {
            $danhmuc->TenDanhMuc = $request->TenDanhMuc;
            $danhmuc->MoTa = htmlentities($request->MoTa);
            $danhmuc->updated_at = time();
            if($request->hasFile('HinhAnh'))
            {
                $file_path = $_SERVER['DOCUMENT_ROOT'].'/cuulongseed/public/Hinh-Anh/'.$danhmuc->HinhAnh;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
                $ext = ['gif','jpg','jpge','png','svg'];
                //get filename with extension
                $fileNameExt= $request->file('HinhAnh')->getClientOriginalName();
                //get file name
                $filename = pathinfo($fileNameExt, PATHINFO_FILENAME);
                // Get extension
                $extension = $request->file('HinhAnh')->getClientOriginalExtension();
                if(!in_array($extension,$ext))
                {
                    return redirect()->back()->withErrors(['errors' => ['Định dạng ảnh không đúng']]);
                }
                // Create new filename
                $filenameToStore = $filename.'_'.time().'.'.$extension;
                // Uplaod image
                $request->HinhAnh->move(public_path('Hinh-Anh'),$filenameToStore);
                $danhmuc->HinhAnh = $filenameToStore;
            }
            $danhmuc->save();
            if($danhmuc)
            {
                return redirect(Route('danhmuc'));
            }
        }
        else
            return redirect()->back()->withErrors(['errors' => ['Danh mục sửa không thành công']]);
    }
    public function getXoaDanhMuc(Request $request)
    {
        $danhmuc = DanhMuc::find($request->id);
        $sanpham = SanPham::where('IdDanhMuc', $request->id)->first();
        if($danhmuc && $sanpham===null)
        {
                if($danhmuc->HinhAnh==='noimage.jpg')
                {
                    $danhmuc->delete();
                }
                else
                {
                    $file_path = $_SERVER['DOCUMENT_ROOT'].'/cuulongseed/public/Hinh-Anh/'.$danhmuc->HinhAnh;
                    if(file_exists($file_path))
                    {
                        unlink($file_path);
                    }
                    $danhmuc->delete();
                }
                return redirect(Route('danhmuc'));

        }
        return redirect()->back()->withErrors(['errors' => ['Có sản phẩm bên trong. Không thể xóa danh mục']]);
    }
}
