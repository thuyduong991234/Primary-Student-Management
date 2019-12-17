<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

use Closure;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(Session::get('giaovien')) {
            return $next($request);            
        }


        return redirect('DangNhap')->with('Thất bại', 'Bạn chưa đăng nhập tài khoản!');
    }
}
