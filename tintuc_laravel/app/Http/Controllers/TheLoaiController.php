<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TheLoai;


class TheLoaiController extends Controller
{
    //
    public function getDanhSach()
    {
        //all() : lấy thất cả (select *)
        $theloai = TheLoai::all();
        return view('admin.theloai.danhsach', ['theloai' => $theloai]);
    }

    public function getThem()
    {
        return view('admin.theloai.them');
    }

    public function postThem(Request $request)
    {

        // [1],[2] : 1 chứa giá trị. 2 chứa lỗi
        $this->validate($request,
            [
                'Ten' =>'required|min:3|max:100'
            ], [
                'Ten.required'=>'Bạn chưa nhập tên thể loại',
                'Ten.unique' => 'Ten thể loại đã tồn tại',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự'
            ]);
            $theloai = new TheLoai;
            $theloai->Ten = $request->Ten;
            // changeTitle : phương thức trong app/function ( Tự add vào)
            $theloai->TenKhongDau = changeTitle($request ->Ten);
            $theloai->save();

            return redirect('admin/theloai/them')->with('thongbao','
                Thêm thành công !');
    }


    public function getSua($id)
    {
                $theloai = TheLoai::find($id);
                return view('admin.theloai.sua',['theloai'=>$theloai]);
    }

    public function postSua(Request $request,$id){
        $theloai = TheLoai::find($id);
        //[1],[2] : mảng 1 chứa biến. mảng 2 chứa lỗi
        $this->validate($request,
            [
                //unique : kiểm tra xem có trùng không, nếu có thì ở đâu
                'Ten' => 'required|unique:TheLoai,Ten|min:3|max:100',
            ],[
                'Ten.required' => 'Bạn chưa nhập tên thể loại',
                'Ten.unique' => 'Ten thể loại đã tồn tại',
                'Ten.min' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự',
                'Ten.max' => 'Tên thể loại phải có độ dài từ 3 cho đến 100 ký tự'
            ]);
        $theloai->Ten = $request->Ten;
        $theloai->TenKhongDau = changeTitle($request->Ten);
        $theloai->save();

        return redirect('admin/theloai/sua/'.$id)->with('thongbao',
            'Sữa thành công !');
    }

    public function getxoa($id){
       $theloai = TheLoai::find($id);
       $theloai->delete();

       return redirect('admin/theloai/danhsach')->with('thongbao'.
       'Bạn đã xóa thành công !!');
    }

}




