<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //

    use AuthenticatesUsers;
    public function __construct()
    {
        $this->middleware('guest')->except('logout');

    }

    /*
     * Phương thức trả về view dùng để đăng nhập cho admin
     * */
    public function login(){
        return view('admin.auth.login');
    }
    /*
     * Phương thức này dùng để đăng nhập cho admin
     * Lấy thông tin từ form có method và POST
     * */
    public function loginAdmin(Request $request){

        //validate dữ liệu
        /*
         * required|email : nghĩa là không được rỗng và phải là kiểu email
         * required|min:6 : nghĩa là không được đễ rỗng và số ký tự tối thiểu là 6
         * */
        $this->validate($request ,array(
            'email' => 'required|email',
            'password' => 'required|min:6'
        ));

        //Đăng nhập
        //Phương thức attempt sẽ trả về true nếu xác thực thành công.
        if(Auth::guard('admin')->attempt(
            ['email' => $request->email,'password' =>$request->password], $request->remember
        )){
            //Nếu đăng nhập thành công thì chuyển hướng về view dashboard của admin
            //Phương thức intended : chuyển hướng URL
            return redirect()->intended(route('admin.dashboard'));
        }
                //  withInput : với input : ?
        // nếu đăng nhập thất bại thì quay trở về form đăng nhập
        // với giá trị của 2 ô input cũ là email và remember
        return redirect()->back()->withInput($request->only('email','remember'));
    }

    /*
     * Phương thức này dùng để đăng xuất
     * */
    public function logout(){

        Auth::guard('admin')->logout();

        // Chuyển hướng về trang login của admin
        return redirect()->route('admin.auth.login');
    }
}
