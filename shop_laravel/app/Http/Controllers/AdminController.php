<?php

namespace App\Http\Controllers;

use App\Model\AdminModel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /*
     * Hàm khởi tạo của class được chạy ngay khi khởi tạo đối tượng
     * Hàm này nó luôn được chọn trước các hàm khác trong class
     * */
    public function __construct()
    {
        $this->middleware('auth:admin')->only('index');
    }

    /*
     * Phương thức trả về view khi đăng nhập thành công
     * */
    public function index(){
        return view('admin.dashboard');
    }
    /*
     * Phương thức trả về view dùng để đăng ký tài khoản admin*/
    public function create(){
        return view('admin.auth.register');
    }
    /*
     * class Request : lấy tất cả dữ liệu mà mình gửi từ form lên url
     * $request : là đối tượng
     * */
    public function store(Request $request){
        /*validate dữ liệu được gửi từ form đi
         *validate : kiểm tra dữ liệu gửi đi có hợp lệ hay không
         *'required' => ':attribute Không được để trống'.
         * */
        $this->validate($request,array(
            'name'=>'required',
            'email'=>'required',
            'password'=>'required'
        ));

        //Khởi tạo model để lưu admin mới
        /*
         * $request ->name : nghĩa là lấy dữ liệu có tên là name từ form
         * bcrypt() : mã hóa mật khẩu trong laravel
         * */
        $adminModel = new AdminModel();
        $adminModel->name = $request ->name;
        $adminModel->email =$request ->email;
        $adminModel->password = bcrypt($request->password);
        $adminModel->save();

        return redirect()->route('admin.auth.login');

    }
}
