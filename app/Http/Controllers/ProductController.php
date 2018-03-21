<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function getProductIndex(){
        $product=DB::table('sanpham')->orderBy('ID', 'desc')->take(6)->get();
        // $path=set($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . (($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "127.0.0.1") ? "/CNWeb" : "") . "/storage/app/public/";
        // if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
		// $_SESSION['baseUrl'] = $path;
        // return view('index', ['product'=>$product, 'path'=>$path]);
        return view('index', ['product'=>$product]);
    }
    public function getProductByID($id){
        $product=DB::table('sanpham')->where('ID','=', $id)->select('sanpham.*')->first();
        // $path=set($_SERVER['HTTPS']) ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] . (($_SERVER['SERVER_NAME'] == "localhost" || $_SERVER['SERVER_NAME'] == "127.0.0.1") ? "/CNWeb" : "") . "/storage/app/public/";
        // if(isset($_SESSION['baseUrl'])) unset($_SESSION['baseUrl']);
        // $_SESSION['baseUrl'] = $path;
        // return view('index', ['product'=>$product, 'path'=>$path]);
        return view('product', ['product'=>$product]);
    }
}
