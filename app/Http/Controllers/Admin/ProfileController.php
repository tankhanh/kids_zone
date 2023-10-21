<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Profile\UpdateRequest;
use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    //
    public function index()
    {
        $edit_myself = null;
        if (Auth::user()->id) {
            $edit_myself = true;
        } else {
            $edit_myself = false;
        }
        return view('admin.modules.profile.index', [
            'myself' => $edit_myself
        ]);
    }

    public function update(UpdateRequest $request)
    {
        $account = Account::findOrFail(Auth::user()->id);

        $auth = Auth::user();
        $user = $auth->user;

        if (!empty($request->password)) {
            $request->validate([
                'password' => 'required|confirmed|min:8'
            ], [
                'password.required' => 'Please enter password',
                'password.confirmed' => 'Confirmation password doesn\'t match',
                'password.min' => 'The password field must be at least 8 characters.',
            ]);

            $account->password = bcrypt($request->password);
        }
        
        $file = $request->profile_pic;
        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($user->profile_pic)) {
                $old_image_path = public_path('uploads/avatar/' . $user->profile_pic);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp hình ảnh cũ
                }
            }
            
            $request->validate([
                'profile_pic' => 'required|mimes:jpg,jpeg,png,svg'
            ], [
                'profile_pic.required' => 'Please enter Image',
                'profile_pic.mimes' => 'Images must be jpeg, png, jpg, svg',
            ]);
            
            $fileName = time() . '-' . $file->getClientOriginalName();
            $user->profile_pic = $fileName;
            $file->move(public_path('uploads/avatar/'), $fileName);
        }


        $user->firstname = $request->firstname;
        $user->lastname = $request->lastname;
        $user->birthday = $request->birthday;
        $user->gender = $request->gender;

        $account->save();
        $user->save();
        return redirect()->route('admin.profile.index')->with('success', 'Update profile successfully');
    }
}