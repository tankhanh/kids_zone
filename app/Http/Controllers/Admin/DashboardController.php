<?php

namespace App\Http\Controllers\Admin;

use App\Models\Account;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Sound;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Image;
use App\Models\User;
use App\Models\Video;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $admin = Account::where('role', '1')->where('status', '1')->count();
        $users = Account::where('role', '2')->where('status', '1')->count();
        $categories = Category::count();
        $lessons = Lesson::count();
        $carts = Cart::count();
        $images = Image::count();
        $sounds = Sound::count();
        $videos = Video::count();

        return view('admin.modules.dashboard.index', [
            'admin' => $admin,
            'users' => $users,
            'categories' => $categories,
            'lessons' => $lessons,
            'carts' => $carts,
            'images' => $images,
            'sounds' => $sounds,
            'videos' => $videos,
        ]);
    }
}