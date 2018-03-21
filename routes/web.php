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

Route::get('/', 'ProductController@getProductIndex');
Route::get('/sanpham/chitiet/{id}', 'ProductController@getProductByID');
//Auth
Route::get('login', 'AuthController@getLogin')->name('login');
Route::post('login', 'AuthController@postLogin');
Route::get('logout','AuthController@logOut')->name('logout');

//Admin
Route::middleware('auth')->prefix('admincuulong')->group(function() {
    Route::get('/', 'administrator\administratorController@getAdmin')->name('admincuulong');
    Route::prefix('danhmuc')->group(function(){
        Route::get('', 'administrator\DanhMucController@index')->name('danhmuc');
        Route::get('themdanhmuc', 'administrator\DanhMucController@getThemDanhMuc')->name('themdanhmuc');
        Route::post('themdanhmuc', 'administrator\DanhMucController@postThemDanhMuc');
        Route::get('suadanhmuc/{id}', 'administrator\DanhMucController@getSuaDanhMuc')->name('suadanhmuc');
        Route::post('suadanhmuc/{id}', 'administrator\DanhMucController@postSuaDanhMuc');
        // Route::get('xoadanhmuc/{id}', 'administrator\DanhMucControllergetXoaDanhMuc')->name('xoadanhmuc');
    });
});
