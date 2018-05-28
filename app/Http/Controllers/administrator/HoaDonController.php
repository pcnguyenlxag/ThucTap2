<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\KhachHang;
use App\HoaDon;

class HoaDonController extends Controller
{
    public function getHoaDon()
    {
        $khachhang= KhachHang::paginate(10);
        $hoadon = HoaDon::get();
        // $hoadon = DB::table('hoadon as h')->join('khachhang as k', 'k.ID','=','h.IDUser')->select('ID','TrangThai')->get();
        return view('administrator.HoaDon.indexHoaDon')->with(['hoadon'=>$hoadon, 'khachhang' => $khachhang]);
    }
    public function getChiTietHD(Request $request)
    {
        $hoadon = HoaDon::find($request->id);
        $khachhang = KhachHang::find($request->id);
        $chitiet = DB::table('chitiethoadon as c')
        ->join('hoadon as h', 'c.IDHoaDon','=','h.ID')
        ->join('sanpham as s', 'c.IDSanPham','=','s.ID')->select('c.*', 's.TenSanPham', 's.GiaSanPham', 's.SoLuong')
        ->where('h.IDKhachHang', '=', $request->id)->paginate(10);
        if($chitiet->isEmpty())
        {
            DB::table('hoadon')->where('IDKhachHang', $request->id)->delete();
            DB::table('KhachHang')->where('ID', $request->id)->delete();
            return redirect(Route('hoadon'));
        }
        return view('administrator.HoaDon.ChiTietHD')->with(['hoadon'=> $hoadon, 'khachhang' => $khachhang, 'chitiet'=>$chitiet]);
    }
    public function getXoaChiTietHD(Request $request)
    {
        $chitiet = DB::table('chitiethoadon')->where('IDChiTiet', $request->id);
        // dd($chitiet);
        // dd(!$chitiet);
        if($chitiet)
        {
            if(DB::table('chitiethoadon')->where('IDChiTiet', $request->id))
            $chitiet = DB::table('chitiethoadon')->where('IDChiTiet', $request->id)->delete();
            return redirect()->back();
            // return redirect(Route('cthoadon'));
            return redirect()->action('HoaDonController@getChiTietHD', ['id' => $request->id]);
        }

        return redirect()->back()->withErrors(['errors' => ['Xóa sản phẩm không thành công']]);
    }
    public function getSuaTrangThaiHD(Request $request)
    {
        $hoadon = HoaDon::find($request->id);
        if($hoadon)
        {
            if($hoadon->TrangThai === 1)
            {
                HoaDon::where('ID','=', $request->id)->update(['TrangThai' =>0]);
            }
            if($hoadon->TrangThai === 0)
            {
                // DB::table('users')->where('id', $request->$id)->update(['level' => 1]);
                  HoaDon::where('ID','=', $request->id)->update(['TrangThai' =>1]);
            }
            return redirect()->back();
        }
        else
        return redirect()->back()->withErrors(['errors' => ['Bạn không thể thay đổi quyền hạn chính mình']]);
    }
    // ********* hoa dơn ************
    public function getXoaHoaDon(Request $request)
    {

        // $hoadon = HoaDon::where('IDKhachHang', $request->id)->select('ID')->get();
        $hoadon = DB::table('hoadon')->where('IDKhachHang', $request->id)->first();
        if($hoadon)
        {
            if(DB::table('chitiethoadon')->where('IDHoaDon', $hoadon->ID))
            {
                DB::table('chitiethoadon')->where('IDHoaDon', $hoadon->ID)->delete();
                DB::table('hoadon')->where('IDKhachHang', $request->id)->delete();
                DB::table('KhachHang')->where('ID', $request->id)->delete();
                return redirect(Route('hoadon'));
            }
            else
            {
                DB::table('hoadon')->where('IDKhachHang', $request->id)->delete();
            }
            return redirect()->back()->withErrors(['errors' => ['xóa hóa đơn không thành công']]);
        }
    }

}
