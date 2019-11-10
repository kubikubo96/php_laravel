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

use App\TheLoai;

Route::get('/', function () {
    return view('welcome');
});
//Route đăng nhập
Route::get('admin/dangnhap','UserController@getDangnhapAdmin');
Route::post('admin/dangnhap','UserController@postdangnhapAdmin');
Route::get('admin/logout','UserController@getDangXuatAdmin');

//Nhóm admin
Route::group(['prefix'=>'admin','middleware'=>'adminLogin'],function(){

    //Nhóm thể loại
    Route::group(['prefix'=>'theloai'],function(){
        // : admin/theloai/danhsach
        Route::get('danhsach','TheLoaiController@getDanhSach');

        Route::get('them','TheLoaiController@getThem');
        Route::post('them','TheLoaiController@postThem');

        Route::get('sua/{id}','TheLoaiController@getSua');
        Route::post('sua/{id}','TheLoaiController@postSua');


        Route::get('xoa/{id}','TheLoaicontroller@getxoa');
    });

    Route::group(['prefix'=>'loaitin'],function(){
        // : admin/loaitin/danhsach
        Route::get('danhsach','LoaiTinController@getDanhSach');

        Route::get('them','LoaiTinController@getThem');
        Route::post('them','LoaiTinController@postThem');

        Route::get('sua/{id}','LoaiTinController@getSua');
        Route::post('sua/{id}','LoaiTinController@postSua');

        Route::get('xoa/{id}','LoaiTincontroller@getxoa');
    });

    Route::group(['prefix'=>'tintuc'],function(){
        // : admin/tintuc/danhsach
        Route::get('danhsach','TinTucController@getDanhSach');

        Route::get('them','TinTucController@getThem');
        Route::post('them','TinTucController@postThem');

        Route::get('sua/{id}','TinTucController@getSua');
        Route::post('sua/{id}','TinTucController@postSua');

        Route::get('xoa/{id}','TinTucController@getXoa');


    });

    Route::group(['prefix'=>'user'],function(){
        // : admin/user/danhsach
        Route::get('danhsach','UserController@getDanhSach');

        Route::get('them','UserController@getThem');
        Route::post('them','UserController@postThem');

        Route::get('sua/{id}','UserController@getSua');
        Route::post('sua/{id}','UserController@postSua');

        Route::get('xoa/{id}','UserController@getXoa');

    });

    Route::group(['prefix'=>'comment'],function(){
        // : admin/comment/danhsach

        Route::get('xoa/{id}/{idTinTuc}','CommentController@getXoa');


    });

    Route::group(['prefix'=>'ajax'],function (){
        Route::get('loaitin/{idTheLoai}','AjaxController@getLoaiTin');
    });

});

/*
 * Trang tin tức
 * */

Route::get('trangchu','PageController@trangchu');

Route::get('lienhe','PageController@lienhe');
Route::get('gioithieu','PageController@gioithieu');

Route::get('loaitin/{id}/{TenKhongDau}.html','PageController@loaitin');
Route::get('tintuc/{id}/{TieuDeKhongDau}.html','PageController@tintuc');

Route::get('dangnhap','PageController@getDangnhap');
Route::post('dangnhap','PageController@postDangnhap');

Route::get('dangxuat','PageController@getDangxuat');

Route::get('nguoidung','PageController@getNguoidung');
Route::post('nguoidung','PageController@postNguoidung');

Route::get('dangky','PageController@getDangky');
Route::post('dangky','PageController@postDangky');

Route::post('comment/{id}','CommentController@postComment');

Route::post('timkiem','PageController@timkiem');


