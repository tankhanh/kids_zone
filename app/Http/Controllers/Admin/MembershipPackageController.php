<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\MembershipPackage\StoreRequest;
use App\Http\Requests\Admin\MembershipPackage\UpdateRequest;
use App\Models\Membershippackage;
use Illuminate\Http\Request;

class MembershipPackageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $packs = Membershippackage::orderby('created_at', 'DESC')->get();
        return view('admin.modules.membershippackage.index', [
            'packs' => $packs,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.modules.membershippackage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //

        $packs = new Membershippackage();

        $packs->package_name = $request->package_name;
        $packs->price = $request->price;
        $packs->benefit = $request->benefit;
        $packs->expiry = $request->expiry;

        $packs->save();

        return redirect()->route('admin.membershippackage.index')->with('success', 'Create membership package successfully');
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
        $pack = Membershippackage::findOrFail($id);
        return view('admin.modules.membershippackage.edit', [
            'id' => $id,
            'pack' => $pack
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $packs = Membershippackage::findOrfail($id);

        $packs->package_name = $request->package_name;
        $packs->price = $request->price;
        $packs->benefit = $request->benefit;
        $packs->expiry = $request->expiry;

        $packs->save();

        return redirect()->route('admin.membershippackage.index')->with('success', 'Update membership package successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $pack = Membershippackage::findOrFail($id);
        
        // Kiểm tra xem có người đang sử dụng gói này hay không
        $usersUsingPack = $pack->account(); // Giả sử có một phương thức users() trong model Membershippackage để lấy người dùng sử dụng gói này.

        if ($usersUsingPack) {
            return redirect()->route('admin.membershippackage.index')->withErrors('You cannot delete this data. There are users using this package.');
        } elseif ($id == 1) {
            return redirect()->back()->withErrors('You cannot delete this data.');
        } else {
            $pack->delete();
            return redirect()->route('admin.membershippackage.index')->with('success', 'Delete membership package successfully');
        }
    }
}