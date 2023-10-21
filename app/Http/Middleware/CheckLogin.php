<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (Auth::check() && Auth::user()->role == $role) {
            return $next($request);
        }
        else
        {
            return redirect('auth/login')->with('error', 'Bạn không có quyền đăng nhập vào đây.');
        }
    }

}