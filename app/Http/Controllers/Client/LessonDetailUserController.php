<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Lesson;
use App\Models\LessonDetail;
use Illuminate\Http\Request;

class LessonDetailUserController extends Controller
{
    //
    public function index()
    {
        //
        $categories = Category::all();
        $lessonDetails = LessonDetail::orderby('created_at', 'DESC')->get();
        return view('lessonDetail', [
            'lessonDetails' => $lessonDetails,
            'categories' => $categories,
        ]);
    }
    public function lessonDetail($lessonId)
    {
        // Lấy thông tin bài học dựa trên $lessonId từ database
        $lesson = Lesson::find($lessonId);
        
        if (!$lesson) {
            // Xử lý khi không tìm thấy bài học
            return abort(404);
        }
        
        // Sử dụng mối quan hệ đã định nghĩa để lấy nội dung
        $images = $lesson->images;
        $sounds = $lesson->sounds;
        $videos = $lesson->videos;
        
        // Trả về view với dữ liệu
        return view('lessonDetail', [
            'lesson' => $lesson,
            'images' => $images,
            'sounds' => $sounds,
            'videos' => $videos,
        ]);
    }
}