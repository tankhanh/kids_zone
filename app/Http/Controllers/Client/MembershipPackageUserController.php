<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Membershippackage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MembershipPackageUserController extends Controller
{
    //
    public function index(){
        $account = Auth::user();
        $mem_pack = Membershippackage::all();
        return view('memebershipPackages',[
            'mem_pack' => $mem_pack,
            'account' => $account,
        ]);
    }
}