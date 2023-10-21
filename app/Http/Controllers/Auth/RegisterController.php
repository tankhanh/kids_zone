<?php

namespace App\Http\Controllers\Auth;

use App\Events\Admin\CreateUserFromAccount;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegisterRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }
    public function register(RegisterRequest $request)
    {
        // Kiểm tra xem email đã tồn tại trong cơ sở dữ liệu hay chưa
        $existingAccount = Account::where('email', $request->email)->first();

        if ($existingAccount) {
            // Xử lý khi email đã tồn tại
            return redirect()->back()->with('error', 'This email is already in use.');
        }

        // Tạo một bản ghi mới trong bảng accounts
        $account = new Account();

        $account->email = $request->email;
        $account->password = bcrypt($request->password);
        $account->status = 1;
        $account->role = 2;

        $firstname = $request->firstname;
        $lastname = $request->lastname;

        if (empty($firstname) || empty($lastname)) {
            // Xử lý khi firstname hoặc lastname trống
            return redirect()->back()->with('error', 'Firstname and lastname are required.');
        }

        // Tạo một bản ghi mới trong bảng users
        $user = new User();
        $user->firstname = $firstname;
        $user->lastname = $lastname;
        $user->save();

        // Cập nhật cột user_id của bảng accounts với ID của bản ghi người dùng mới
        $account->user_id = $user->id;
        $account->save();

        // Gửi sự kiện để tạo bản ghi trong bảng users
        event(new CreateUserFromAccount($account));

        return redirect()->route('login');
    }

}