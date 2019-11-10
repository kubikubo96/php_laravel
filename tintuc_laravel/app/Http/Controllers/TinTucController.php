<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use Illuminate\Http\Request;
use App\TheLoai;
use App\TinTuc;
use App\Loaitin;
use App\Comment;

class TinTucController extends Controller
{
    //
    public function getDanhSach()
    {
        //all() : lấy thất cả (select *)
        //$tintuc =TinTuc::orderBy('id','DESC')->get();
        $tintuc = TinTuc::all();
        return view('admin.tintuc.danhsach',['tintuc'=>$tintuc]);
    }

    public function getThem()
    {
        $theloai =TheLoai::all();
        $loaitin =Loaitin::all();
        return view('admin.tintuc.them',['theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postThem(Request $request)
    {
        $this->validate($request,
            [
                'LoaiTin'=>'required',
                'TieuDe'=>'required|min:3|unique:TinTuc,TieuDe',
                'TomTat'=>'required',
                'NoiDung'=>'required'
            ],[
                'LoaiTin.required'=>'Bạn chưa chọn loại tin',
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'TieuDe.min'=>'Tiêu đề phải có ít nhất 3 ký tự',
                'TieuDe.unique'=>'Tiêu đề đã tồn tại',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'Noidung.required'=>'Bạn chưa nhập nội dung'
            ]);

        $tintuc = new TinTuc;
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat =$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;
        $tintuc->SoLuotXem = 0;

        //hasFile : kiểm tra xem người dùng có truyền hình k. nếu k có thì để rỗng
        if($request->hasFile('Hinh')){

            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg' ){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $arr = ['a','b','c','d','e','f','g','h','k','l','m','n'];
            $name = $file->getClientOriginalName();
            $Hinh = Arr::random($arr)."_".$name;

            //file_exists : kiểm tra file có tồn tại hay không
            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = Arr::random($arr)."_".$name;
            }
            $file->move('upload/tintuc',$Hinh);

            $tintuc->Hinh = $Hinh;

        }else{
            $tintuc->Hinh="";
        }
        $tintuc->save();

        return redirect('admin/tintuc/them')->with('thongbao','Bạn đã thêm tin tức thành công');
    }


    public function getSua($id)
    {
        $theloai =TheLoai::all();
        $loaitin =Loaitin::all();
        $tintuc = TinTuc::find($id);
        return view('admin.tintuc.sua',['tintuc'=>$tintuc,'theloai'=>$theloai,'loaitin'=>$loaitin]);
    }

    public function postSua(Request $request,$id){

        $this->validate($request,
            [
                'LoaiTin'=>'required',
                'TieuDe'=>'required',
                'TomTat'=>'required',
                'NoiDung'=>'required'
            ],[
                'LoaiTin.required'=>'Bạn chưa chọn loại tin',
                'TieuDe.required'=>'Bạn chưa nhập tiêu đề',
                'TomTat.required'=>'Bạn chưa nhập tóm tắt',
                'Noidung.required'=>'Bạn chưa nhập nội dung'
            ]);
        $tintuc = TinTuc::find($id);
        $tintuc->TieuDe = $request->TieuDe;
        $tintuc->TieuDeKhongDau = changeTitle($request->TieuDe);
        $tintuc->idLoaiTin = $request->LoaiTin;
        $tintuc->TomTat =$request->TomTat;
        $tintuc->NoiDung=$request->NoiDung;

        //hasFile : kiểm tra xem người dùng có truyền hình k. nếu k có thì để rỗng
        if($request->hasFile('Hinh')){

            $file = $request->file('Hinh');
            $duoi = $file->getClientOriginalExtension();
            if( $duoi != 'jpg' && $duoi !='png' && $duoi != 'jpeg' ){
                return redirect('admin/tintuc/them')->with('loi','Bạn chỉ được chọn file có đuôi jpg,png,jpeg');
            }
            $arr = ['a','b','c','d','e','f','g','h','k','l','m','n'];
            $name = $file->getClientOriginalName();
            $Hinh = Arr::random($arr)."_".$name;

            //file_exists : kiểm tra file có tồn tại hay không
            while(file_exists("upload/tintuc/".$Hinh)){
                $Hinh = Arr::random($arr)."_".$name;
            }
            $file->move('upload/tintuc',$Hinh);
            //unlink: Xóa file hình cũ
            unlink("upload/tintuc/".$tintuc->Hinh);
            $tintuc->Hinh = $Hinh;

        }
        $tintuc->save();
        return redirect('admin/tintuc/sua/'.$id)->with('thongbao','Sữa thành công');

    }

    public function getxoa($id){
        $tintuc = TinTuc::find($id);
        $tintuc->delete();

        return redirect('admin/tintuc/danhsach')->with('thongbao','Xóa thành công');
    }

}




