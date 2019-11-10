<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TheLoai extends Model
{
    //
    protected $table = "TheLoai";

    //Tạo liên kết model thể loại tới loại tin
    public function loaitin(){
        return $this->hasMany('App\LoaiTin','idTheLoai','id');
    }

    //Liên kết thể loại tới tin tức
    public function tintuc(){

        return $this->hasManyThrough('App\TinTuc','App\LoaiTin','idTheLoai',
            'idLoaiTin','id');
    }

}
