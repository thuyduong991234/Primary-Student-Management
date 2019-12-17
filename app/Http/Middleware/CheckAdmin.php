<?php

namespace App\Http\Middleware;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Session;

use Closure;

class CheckAdmin
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
        if(Session::get('giaovien')->chucvu == 'Phó hiệu trưởng' || Session::get('giaovien')->chucvu == 'Hiệu trưởng') {
            return $next($request);            
        }
        return redirect()->back()->with('Phân quyền', 'Bạn không có quyền truy cập vào chức năng này!');
    }
}
