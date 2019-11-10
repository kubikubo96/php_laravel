<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use http\Client\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\User;

class AuthController extends Controller
{
    //
    public function login(Request $request)
    {
        $username = $request['username'];
        $password = $request['password'];

//        Đăng nhập bằng User
//        $user = User::find(8);
//        Auth::login($user);
//        return view('thanhcong',['user'=>Auth::user()]);


        //attempt : kiểm tra thông tin đăng nhập có đúng trong csdl
        if (Auth::attempt(['name' => $username, 'password' => $password])) {
            return view('thanhcong', ['user' => Auth::user()]);
        } else {
            return view('dangnhap', ['error' => 'Đăng nhập thất bại']);

        }

    }

    public function logout()
    {
        // Auth::logout() : dùng để logout
        Auth::logout();
        return view('dangnhap');
    }
}
