<?php

namespace App\Http\Controllers\administrator;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Slider;
use Validator;

class administratorController extends Controller
{
    public function indexAdmin() {
        return view('administrator.indexAdmin');
    }

    public function getSuaTrang() {
        $slider=Slider::where([['TrangThai',1],['TenSlide','Slider']])->paginate(5);
        return view('administrator.SuaTrang.indexSlider')->with(['slider' => $slider]);
    }

    public function postThemSilder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'HinhAnh' =>'required|image|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $slider= new Slider();
        $slider->TenSlide = 'Slider';
        $slider->HinhAnh = $request->HinhAnh;
        $slider->TrangThai = 1;
        $slider->created_at = time();
        $slider->updated_at = null;
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
            $request->HinhAnh->move(public_path('Hinh-Anh/Slider/'),$filenameToStore);
            $slider->HinhAnh = $filenameToStore;
            $slider->save();
            return redirect(Route('suatrang'));
        }
        else
            return redirect()->back()->withErrors(['errors' => ['Bạn chưa chọn hình']]);
    }
    public function getXoaSlider(Request $request)
    {
        $slider = Slider::find($request->id);
        if($slider)
        {
            $file_path = $_SERVER['DOCUMENT_ROOT'].'/cuulongseed/public/Hinh-Anh/Slider/'.$slider->HinhAnh;
            if(file_exists($file_path)) {
                unlink($file_path);
            }
            $slider->delete();
            return redirect()->back();
        }
        return redirect()->back()->withErrors(['errors' => ['Không thể xóa Slider']]);
    }
// ***********************
    public function getSubSlider() {
        $subslider=Slider::where([['TrangThai',1],['TenSlide','Sub-Slider']])->paginate(5);
        return view('administrator.SuaTrang.SubSlider')->with(['subslider' => $subslider]);
    }
    public function postThemSubSilder(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'HinhAnh' =>'required|image|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $subslider= new Slider();
        $subslider->TenSlide = 'Sub-Slider';
        $subslider->HinhAnh = $request->HinhAnh;
        $subslider->TrangThai = 1;
        $subslider->created_at = time();
        $subslider->updated_at = null;
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
            $request->HinhAnh->move(public_path('Hinh-Anh/Slider/'),$filenameToStore);
            $subslider->HinhAnh = $filenameToStore;
            $subslider->save();
            return redirect(Route('getsubtrang'));
        }
        else
            return redirect()->back()->withErrors(['errors' => ['Bạn chưa chọn hình']]);
    }

    public function getBanner() {
        $banner=Slider::where([['TrangThai',1],['TenSlide','Banner']])->paginate(5);
        return view('administrator.SuaTrang.Banner')->with(['banner' => $banner]);
    }
    public function postThemBanner(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'HinhAnh' =>'required|image|max:2048'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        }
        $banner= new Slider();
        $banner->TenSlide = 'Banner';
        $banner->HinhAnh = $request->HinhAnh;
        $banner->TrangThai = 1;
        $banner->created_at = time();
        $banner->updated_at = null;
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
            $request->HinhAnh->move(public_path('Hinh-Anh/Slider/'),$filenameToStore);
            $banner->HinhAnh = $filenameToStore;
            $banner->save();
            return redirect(Route('getbanner'));
        }
        else
            return redirect()->back()->withErrors(['errors' => ['Bạn chưa chọn hình']]);
    }
}
