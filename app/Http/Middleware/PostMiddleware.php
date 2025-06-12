<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PostMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if(1==1) { // check điều kiện (nếu đúng thì cho truy cập vào tiếp, ngược lại sai thì redirect sang trang khác)
            return $next($request);
        }

        return redirect('/login');
    }
}
