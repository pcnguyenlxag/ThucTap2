<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//Page
Route::get('/', 'HomeController@getProductIndex');

Route::get('/sanpham/chitiet/{id}', 'HomeController@getProductByID');
Route::get('/danhmuc', 'HomeController@getCatelory');
Route::get('/danhmuc/chitiet/{id}', 'HomeController@getCateloryByID');

//Auth
Route::get('login', 'AuthController@getLogin')->name('login');
Route::post('login', 'AuthController@postLogin');
Route::get('logout','AuthController@logOut')->name('logout');

//Admin
Route::middleware('auth')->prefix('admincuulong')->group(function() {
    Route::get('/', 'administrator\administratorController@indexAdmin')->name('admincuulong');
    Route::prefix('danhmuc')->group(function(){
        Route::get('', 'administrator\DanhMucController@index')->name('danhmuc');
        Route::get('themdanhmuc', 'administrator\DanhMucController@getThemDanhMuc')->name('themdanhmuc');
        Route::post('themdanhmuc', 'administrator\DanhMucController@postThemDanhMuc');
        Route::get('suadanhmuc/{id}', 'administrator\DanhMucController@getSuaDanhMuc')->name('suadanhmuc');
        Route::post('suadanhmuc/{id}', 'administrator\DanhMucController@postSuaDanhMuc');
        Route::get('xoadanhmuc/{id}', 'administrator\DanhMucController@getXoaDanhMuc')->name('xoadanhmuc');
    });
    Route::prefix('sanpham')->group(function(){
        Route::get('', 'administrator\SanPhamController@index')->name('sanpham');
        Route::get('themsanpham', 'administrator\SanPhamController@getThemSanPham')->name('themsanpham');
        Route::post('themsanpham', 'administrator\SanPhamController@postThemSanPham');
        Route::get('suasanpham/{id}', 'administrator\SanPhamController@getSuaSanPham')->name('suasanpham');
        Route::post('suasanpham/{id}', 'administrator\SanPhamController@postSuaSanPham');
        Route::get('xoasanpham/{id}', 'administrator\SanPhamController@getXoaSanPham')->name('xoasanpham');
    });
    Route::prefix('suatrang')->group(function(){
        Route::get('', 'administrator\administratorController@getSuaTrang')->name('suatrang');
        Route::post('', 'administrator\administratorController@postThemSilder')->name('themslider');
        Route::get('xoa/{id}', 'administrator\administratorController@getXoaSlider')->name('getxoaslider');

        Route::get('subslider', 'administrator\administratorController@getSubSlider')->name('getsubtrang');
        Route::post('subslider', 'administrator\administratorController@postThemSubSilder')->name('themsubslider');

        Route::get('banner', 'administrator\administratorController@getBanner')->name('getbanner');
        Route::post('banner', 'administrator\administratorController@postThemBanner')->name('thembanner');
    });
    Route::prefix('nhanvien')->group(function(){
        Route::get('', 'administrator\NhanVienController@getNhanVien')->name('nhanvien');
        Route::get('themnhanvien', 'administrator\NhanVienController@getThemNhanVien')->name('themnhanvien');
        Route::post('themnhanvien', 'administrator\NhanVienController@postThemNhanVien');
        // Route::get('suanhanvien/{id}', 'administrator\NhanVienController@getSuaNhanVien')->name('suanhanvien');
        Route::get('/{id}', 'administrator\NhanVienController@getSuaNhanVien')->name('suanhanvien');
        Route::get('xoanhanvien/{id}', 'administrator\NhanVienController@getXoaNhanVien')->name('xoanhanvien');
    });
    Route::prefix('taikhoan')->group(function(){
        Route::get('', 'administrator\TaiKhoanController@getTaiKhoan')->name('suataikhoan');
        Route::post('', 'administrator\TaiKhoanController@postSuaTaiKhoan');
        Route::post('', 'administrator\TaiKhoanController@postDoiMK');
    });
});
