<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    //
    public function showLogin()
    {
        return view('auth.login');
    }
    public function login(LoginRequest $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 1,
        ];

        if (Auth::attempt($credentials)) {
            // Đăng nhập thành công, truyền thông báo vào session và chuyển hướng
            $account = Auth::user();
            if ($account->role == 1) {
                return redirect()->route('admin.dashboard.index')->with('success', 'Login successfully!');
            } elseif ($account->role == 2) {
                return redirect('/lessons')->with('success', 'Login successfully!');
            }
        } else {
            // Đăng nhập không thành công, truyền thông báo lỗi và quay lại trang đăng nhập
            return redirect()->route('login')->withErrors(['password' => 'Wrong password']);
        }
    }
}