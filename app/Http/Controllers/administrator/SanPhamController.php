<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\SanPham;
use App\DanhMuc;
use Validator;

class SanPhamController extends Controller
{
    public function index()
    {
        $danhmuc = DanhMuc::where('TrangThai',1)->get();
        $sanpham = SanPham::paginate(10);
        return view('administrator.SanPham.indexSanPham')->with(['sanpham' => $sanpham, 'danhmuc' =>$danhmuc]);
    }
    public function getThemSanPham()
    {
        $danhmuc = DanhMuc::where('TrangThai',1)->get();
        return view('administrator.SanPham.ThemSanPham')->with(['danhmuc' =>$danhmuc]);
    }
    public function postThemSanPham(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'TenSanPham' => 'required',
            'HinhAnh' =>'image|max:2048',
            'MoTa' => 'required',
            'IdDanhMuc' =>'required|numeric',
            'GiaSanPham' =>'required|numeric',
            'SoLuong' => 'numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $sanpham= new SanPham();
        $sanpham->TenSanPham = $request->TenSanPham;
        $sanpham->MoTa = htmlentities($request->MoTa);
        $sanpham->ThuocTinh = htmlentities($request->ThuocTinh);
        $sanpham->IdDanhMuc = $request->IdDanhMuc;
        $sanpham->GiaSanPham = $request->GiaSanPham;
        $sanpham->SoLuong = $request->SoLuong;
        $sanpham->created_at = time();
        $sanpham->updated_at = null;
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
            $request->HinhAnh->move(public_path('Hinh-Anh/San-Pham/'),$filenameToStore);
            $sanpham->HinhAnh = $filenameToStore;
        }
        else {
            $sanpham->HinhAnh = 'noimage.jpg';
        }
        $sanpham->save();
        if($sanpham)
        {
            return redirect(Route('sanpham'));
        }
        else
        return redirect()->back()->withErrors(['errors' => ['Sản phẩm thêm không thành công']]);
    }

    public function getSuaSanPham(Request $request)
    {
        $danhmuc = DanhMuc::where('TrangThai',1)->get();
        $sanphamid = SanPham::where('ID',$request->id)->first();
        if(! $sanphamid) {
            return redirect()->back()->withErrors(['errors' => ['Không tìm thấy sản phẩm']]);
        }
        return view('administrator.SanPham.ThemSanPham')->with(['sanphamid'=>$sanphamid, 'danhmuc'=>$danhmuc]);
    }

    public function postSuaSanPham(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'TenSanPham' => 'required',
            'HinhAnh' =>'image|max:2048',
            'MoTa' => 'required',
            'IdDanhMuc' =>'required|numeric',
            'GiaSanPham' =>'required|numeric',
            'SoLuong' =>'numeric'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $sanpham = SanPham::find($request->id);
        if($sanpham)
        {
            $sanpham->TenSanPham = $request->TenSanPham;
            $sanpham->MoTa = htmlentities($request->MoTa);
            $sanpham->ThuocTinh = htmlentities($request->ThuocTinh);
            $sanpham->IdDanhMuc = $request->IdDanhMuc;
            $sanpham->GiaSanPham = $request->GiaSanPham;
            $sanpham->SoLuong = $request->SoLuong;
            $sanpham->updated_at =  time();
            if($request->hasFile('HinhAnh'))
            {
                $file_path = $_SERVER['DOCUMENT_ROOT'].'/cuulongseed/public/Hinh-Anh/San-Pham/'.$sanpham->HinhAnh;
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
                // $path= $request->file('HinhAnh')->storeAs(public_path('Hinh-Anh'), $filenameToStore);
                $request->HinhAnh->move(public_path('Hinh-Anh/San-Pham/'),$filenameToStore);
                $sanpham->HinhAnh = $filenameToStore;
            }
            else {
                $sanpham->HinhAnh = 'noimage.jpg';
            }
            $sanpham->save();
            if($sanpham)
            {
                return redirect(Route('sanpham'));
            }
        }
        else
        return redirect()->back()->withErrors(['errors' => ['Sản phẩm thêm không thành công']]);
    }

    public function getXoaSanPham(Request $request)
    {
        $sanpham = SanPham::find($request->id);
        if($sanpham)
        {
            if($sanpham->HinhAnh==='noimage.jpg')
            {
                $sanpham->delete();
            }
            else {
                $file_path = $_SERVER['DOCUMENT_ROOT'].'/cuulongseed/public/Hinh-Anh/San-Pham/'.$sanpham->HinhAnh;
                if(file_exists($file_path)) {
                    unlink($file_path);
                }
                $sanpham->delete();
            }
            return redirect(Route('sanpham'));
        }
        return redirect()->back()->withErrors(['errors' => ['Không thể xóa sản phẩm']]);
    }
}
