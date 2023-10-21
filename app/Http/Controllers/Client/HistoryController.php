<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HistoryController extends Controller
{
    //
    public function history()
    {
        $user = Auth::user();

        // Lấy tất cả giỏ hàng có trạng thái 2 (đã thanh toán) của người dùng
        $cart = $user->carts->where('status', 2);

        return view('history', [
            'cart' => $cart
        ]);
    }
}