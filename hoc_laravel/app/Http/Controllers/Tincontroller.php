<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Tin;


class Tincontroller extends Controller
{
    //
    //Phân trang trong laravel
    public function index(){

        $tin = Tin::where('id','>=','2')->paginate(3);
//        $tin = Tin::where('id','>=','2')->paginate(3)->setPath('Tintrongnuoc/tin');
//        $tin = Tin::where('id','>=','2')->simplePaginate(3);

        return view('tin',['tin'=>$tin]);

    }
}
