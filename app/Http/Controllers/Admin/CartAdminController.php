<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\CartDetail;
use Illuminate\Http\Request;

class CartAdminController extends Controller
{
    //
    public function index()
    {
        //
        $cart = Cart::all();

        return view('admin.modules.cart.index', [
            'cart' => $cart
        ]);
    }
}