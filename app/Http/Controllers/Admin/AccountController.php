<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Account\StoreRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Action;
use App\Events\Admin\CreateUserFromAccount; // Import event
use App\Http\Requests\Admin\Account\UpdateRequest;
use App\Models\Account; // Import model Account
use App\Models\Membershippackage;
use Illuminate\Support\Facades\Auth;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $accounts = Account::orderby('created_at', 'DESC')
        ->where('status', '!=', 3)->where('id', '!=', 1)
        ->where('id', '!=', Auth::user()->id)
        ->with('user', 'membershipPackage')->get();
        return view('admin.modules.account.index', [
            'accounts' => $accounts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.modules.account.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        // Tạo một bản ghi mới trong bảng accounts
        $account = new Account();

        $account->email = $request->email;
        $account->password = bcrypt($request->password);
        $account->status = $request->status;
        $account->role = $request->role;

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

        return redirect()->route('admin.account.index')->with('success', 'Create account successfully');
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
        
        return view('admin.modules.account.edit', [
            'id' => $id,
            'account' => $account,
            'myself' => $edit_myself
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $account = Account::findOrFail($id);

        $account->email = $request->email;

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

        $account->status = $request->status;
        $account->role = $request->role;

        $account->save();

        return redirect()->route('admin.account.index')->with('success', 'Update account successfully');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $account = Account::findOrFail($id);
        $account->status = 3;
        $account->save();

        return redirect()->route('admin.account.index')->with('success', 'Delete account successfully');

    }
}