<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\Membershippackage;
use Illuminate\Http\Request;

class LessonUserController extends Controller
{
    //
    public function index()
    {
        $account = auth()->user();
        $categories = Category::all();
        $memberships = Membershippackage::all();
        $lessons = Lesson::orderBy('created_at', 'ASC')->get();

        return view('lesson', [
            'lessons' => $lessons,
            'categories' => $categories,
            'memberships' => $memberships,
            'account' => $account,
        ]);
    }
}