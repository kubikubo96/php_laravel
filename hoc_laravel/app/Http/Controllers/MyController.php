<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MyController extends Controller
{
    //Hàm ...
    public function XinChao()
    {
        echo "Chao Cac ban";
    }

    public function KhoaHoc($ten)
    {
        echo "Khoa hoc :" . $ten;
        return redirect()->route('myRoute');
    }

    //Hàm để GetURL
    public function GetURL(Request $request)
    {
        //path()  : phương thức trả về URL truyền lên
//        return $request->path();
        //url()  : phương thức trả về url full link
//        return $request->url();

//        if($request->isMethod('get'))
//            echo "Phương thức Get";
//        else
//            echo "Không phải phương thức Get";

        if ($request->is('My*'))
            echo "Có My";
        else
            echo "Không có my";
    }

    //Hàm để xử lý postForm
    public function postForm(Request $request)
    {

//        echo "ten cua ban la : ";
//        echo $request->HoTen;
        if ($request->has('tuoi'))
            echo "Có tham số";
        else
            echo "Không có tham số";
    }

    //Hàm để selCookie
    public function setCookie()
    {

        $response = new Response();
        /*
         * cookie :
         * name : KhoaHoc
         * noidung : Laravel - Khoa Pham
         * thoi gian ton tai : 1s
         * */
        $response->withCookie('KhoaHoc', 'Laravel - Khoa Pham', 1);
        echo "Da set Cookie";
        return $response;
    }

    //Hàm để getCookie
    public function getCookie(Request $request)
    {

        echo "Cookie cua ban la:";
        return $request->cookie('KhoaHoc');
    }

    // Hàm để post file
    public function postFile(Request $request)
    {

        //hasFile() : kiem  tra file co ton tai hay khong?

        if ($request->hasFile('myFile')) {

//            echo "Đã có file";
            $file = $request->file('myFile');

            //kiểm tra xem file tải lên có phải file ảnh hay không
            if (($file->getClientOriginalExtension('myFile') == "jpg") ||
                ($file->getClientOriginalExtension('myFile') == "png") ||
                ($file->getClientOriginalExtension('myFile') == "jpeg")) {

                //Lấy tên file theo tên mình upload
                $filename = $file->getClientOriginalName('myFile');
                $file->move('images', $filename);
                echo "Đã lưu file : ".$filename;
            }else{
                echo "Chỉ tải lên file ảnh !! Update fail .";
            }
        } else {
            echo "Chưa có file";
        }
    }

    //Hàm get json trả về dạng file json
    public function getJson(){
//        $array = ['Laravel','PHP','Asp.net','HTML'];
        $array = ['KhoaPham'=>'Laravel - Khoa Pham'];
        return response()->json($array);
    }

    //hàm myview trả về view
    public function  myView(){
        /*
         * viewKhoaPham/KhoaPham.php
         * */
        return view('viewKhoaPham.KhoaPham');
    }
    // Hàm trả về view có truyền tham số
    public function Time($t){
        return view('myView',['t'=>$t]);
    }

//    //Hàm trả về view có truyền tham số

//    public function blade($str){
//        $khoahoc = " Laravel - Khoa Pham";
//        if($str == 'laravel')
//            return view('pages.laravel');
//        elseif($str == 'php')
//            return view('pages.php');
//    }

    //Hàm trả về view có truyền tham số lên url và ( biến trong view)
    public function blade($str){
        $khoahoc = " Laravel - Khoa Pham";
        if($str == 'laravel')
            return view('pages.laravel',['khoahoc' => $khoahoc]);
        elseif($str == 'php')
            return view('pages.php',['khoahoc' => $khoahoc]);
    }

}
