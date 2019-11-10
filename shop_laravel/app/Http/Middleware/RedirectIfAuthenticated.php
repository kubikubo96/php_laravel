<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    /*
     * Xử lý khi chúng ta đăng nhập thành công
     * */

    public function handle($request, Closure $next, $guard = null)
    {
        /*
         * Nối tiếp cái đã cấu hình trong config/auth
         * */
        switch ($guard){
            case 'admin' :
                if(Auth::guard($guard)->check()){
                    return redirect()->route('admin.dashboard');
                }
                break;
            default :
                if(Auth::guard($guard)->check()){
                    return redirect()->route('home');
                }
                break;
        }
        // switch ($guard) : end phần tự viết

        /**
         * comment lại phần của laravel : 3 dòng bên dưới
         */
//        if (Auth::guard($guard)->check()) {
//            return redirect('/home');
//        }

        return $next($request);
    }
}
