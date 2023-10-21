<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\User\UpdateRequest;
use App\Models\Account;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Sử dụng Eloquent để lấy các người dùng
        $users = User::whereHas('account', function ($query) {
            // Điều kiện để lấy các bản ghi Account với role khác 1
            $query->where('status', '!=', 3)->where('id', '!=', 1);
        })->where('id', '!=', Auth::user()->id)->orderBy('created_at', 'DESC')->get();
        return view('admin.modules.user.index', [
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.modules.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        //
        $user = User::findOrFail($id);
        $account = Account::findOrFail($id);
        $edit_myself = null;
        if(Auth::user()->id == $id){
            $edit_myself = true;
        } else{
            $edit_myself = false;
        }
        
        if(Auth::user()->id != 1 && ($id == 1 || ($account["role"] == 1 && $edit_myself == false))){
            return redirect()->route('admin.account.index')->with('error', 'You haven\'t permission to edit this user.');
        }
        return view('admin.modules.user.edit', [
            'id' => $id,
            'user' => $user,
            'myself' => $edit_myself
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $user = User::findOrFail($id);

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
                'profile_pic' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
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
        $user->save();

        return redirect()->route('admin.user.index')->with('success', 'Update user successfully');
    }

}