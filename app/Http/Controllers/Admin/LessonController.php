<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Lesson\StoreRequest;
use App\Http\Requests\Admin\Lesson\UpdateRequest;
use App\Models\Category;
use App\Models\Image;
use App\Models\Lesson;
use App\Models\Membershippackage;
use App\Models\Sound;
use App\Models\Video;
use DateTime;
use Illuminate\Http\Request;

class LessonController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $lessons = Lesson::orderby('created_at', 'DESC')->get();
        return view('admin.modules.lesson.index', [
            'lessons' => $lessons,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::get();
        $memberships = Membershippackage::get();
        return view('admin.modules.lesson.create', [
            'categories' => $categories,
            'memberships' => $memberships
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //

        $lesson = new Lesson();

        $lesson->title = $request->title;
        $lesson->category_id = $request->category_id;
        $lesson->description = $request->description;
        $lesson->age = $request->age;
        $lesson->package_id = $request->package_id;

        $file = $request->mainImage;

        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($lesson->mainImage)) {
                $old_image_path = public_path('uploads/background/' . $lesson->mainImage);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'mainImage' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
            ], [
                'mainImage.required' => 'Please enter Image',
                'mainImage.mimes' => 'Images must be jpeg, png, jpg, svg',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $lesson->mainImage = $fileName;
            $file->move(public_path('uploads/background/'), $fileName);
        }

        $lesson->save();
        // Upload IMAGE
        if (count($request->images) > 0) {
            $data_images = [];
            foreach ($request->images as $img_detail) {
                $fileNameDetail = time() . '-' . $img_detail->getClientOriginalName();
                $img_detail->move(public_path('uploads/imageDetail/'), $fileNameDetail);
                $data_images[] = [
                    'url' => $fileNameDetail,
                    'lesson_id' => $lesson->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ];
            }
            Image::insert($data_images);
        }

        // Upload SOUND
        if (count($request->sounds) > 0) {
            $data_sounds = [];
            foreach ($request->sounds as $sound_detail) {
                $fileNameDetail = time() . '-' . $sound_detail->getClientOriginalName();
                $sound_detail->move(public_path('uploads/sounds/'), $fileNameDetail);
                $data_sounds[] = [
                    'url' => $fileNameDetail,
                    'lesson_id' => $lesson->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ];
            }
            Sound::insert($data_sounds);
        }

        // Upload VIDEO
        if (count($request->videos) > 0) {
            $data_videos = [];
            foreach ($request->videos as $video_detail) {
                $fileNameDetail = time() . '-' . $video_detail->getClientOriginalName();
                $video_detail->move(public_path('uploads/videos/'), $fileNameDetail);
                $data_videos[] = [
                    'url' => $fileNameDetail,
                    'lesson_id' => $lesson->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ];
            }
            Video::insert($data_videos);
        }

        return redirect()->route('admin.lesson.index')->with('success', 'Create lesson successfully');

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
        $lesson = Lesson::with('images', 'sounds', 'videos')->findOrFail($id);
        $categories = Category::get();
        $memberships = Membershippackage::get();

        return view('admin.modules.lesson.edit', [
            'id' => $id,
            'lesson' => $lesson,
            'categories' => $categories,
            'memberships' => $memberships,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        $lesson = Lesson::findOrFail($id);

        // Xử lý các trường thông tin của bài học
        $lesson->title = $request->title;
        $lesson->category_id = $request->category_id;
        $lesson->description = $request->description;
        $lesson->age = $request->age;
        $lesson->package_id = $request->package_id;

        // Xử lý tệp hình ảnh nếu có
        $file = $request->mainImage;
        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($lesson->mainImage)) {
                $old_image_path = public_path('uploads/background/' . $lesson->mainImage);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'mainImage' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
            ], [
                'mainImage.required' => 'Please enter Image',
                'mainImage.mimes' => 'Images must be jpeg, png, jpg, svg',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $lesson->mainImage = $fileName;
            $file->move(public_path('uploads/background/'), $fileName);
        }

        // Lưu bài học
        $lesson->save();

        // Xử lý hình ảnh nếu có
        if (isset($request->images) && count($request->images) > 0) {
            $countImage = 0;
            $data_images = [];
            foreach ($request->images as $img_detail) {
                $countImage++;
                $fileNameDetail_image = time() . '-' . $img_detail->getClientOriginalName();
                $img_detail->move(public_path('uploads/imageDetail/'), $fileNameDetail_image);
                $data_images[] = [
                    'url' => $fileNameDetail_image,
                    'lesson_id' => $lesson->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ];
            }
            Image::insert($data_images);
        }

        // Xử lý âm thanh nếu có
        if (isset($request->sounds) && count($request->sounds) > 0) {
            $countSound = 0;
            $data_sounds = [];
            foreach ($request->sounds as $sound_detail) {
                $countSound++;
                $fileNameDetail_sound = time() . '-' . $sound_detail->getClientOriginalName();
                $sound_detail->move(public_path('uploads/sounds/'), $fileNameDetail_sound);
                $data_sounds[] = [
                    'url' => $fileNameDetail_sound,
                    'lesson_id' => $lesson->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ];
            }
            Sound::insert($data_sounds);
        }

        // Xử lý video nếu có
        if (isset($request->videos) && count($request->videos) > 0) {
            $countVideo = 0;
            $data_videos = [];
            foreach ($request->videos as $video_detail) {
                $countVideo++;
                $fileNameDetail_video = time() . '-' . $video_detail->getClientOriginalName();
                $video_detail->move(public_path('uploads/videos/'), $fileNameDetail_video);
                $data_videos[] = [
                    'url' => $fileNameDetail_video,
                    'lesson_id' => $lesson->id,
                    'created_at' => new DateTime(),
                    'updated_at' => new DateTime(),
                ];
            }
            video::insert($data_videos);
        }

        return redirect()->route('admin.lesson.index')->with('success', 'Update lesson successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //

        $lesson = Lesson::findOrFail($id);
        $lessonPath = public_path('uploads/background/' . $lesson->mainImage);
        if (file_exists($lessonPath)) {
            unlink($lessonPath);
        }
        $lesson->images()->delete();
        $lesson->sounds()->delete();
        $lesson->videos()->delete();
        $lesson->delete();
        return redirect()->route('admin.lesson.index')->with('success', 'Delete lesson successfully');
    }

    public function uploadFileImage(Request $request, $id)
    {
        $fileImage = $request->file('image');
        $image = Image::find($id);

        if ($image && $fileImage) {
            // Xử lý tải lên hình ảnh
            $fileImageName = time() . '-' . $fileImage->getClientOriginalName();
            $fileImage->move(public_path('uploads/imageDetail/'), $fileImageName);

            // Xóa tệp hình ảnh cũ nếu nó tồn tại
            $file_old_url_image = public_path('uploads/imageDetail/' . $image->url);
            if (file_exists($file_old_url_image)) {
                unlink($file_old_url_image);
            }

            // Cập nhật URL hình ảnh trong cơ sở dữ liệu
            $image->url = $fileImageName;
            $image->save();

            return response()->json([
                'message' => 'Tải hình ảnh lên thành công',
                'image_url' => asset('uploads/imageDetail/' . $fileImageName)
            ], 200);
        }

        return response()->json([
            'error' => 'Không tìm thấy tệp'
        ], 400);
    }

    public function uploadFileSound(Request $request, $id)
    {
        $fileSound = $request->file('sound');
        $sound = Sound::find($id);

        if ($sound && $fileSound) {
            // Xử lý tải lên âm thanh
            $fileSoundName = time() . '-' . $fileSound->getClientOriginalName();
            $fileSound->move(public_path('uploads/sounds/'), $fileSoundName);

            // Xóa tệp âm thanh cũ nếu nó tồn tại
            $file_old_url_sound = public_path('uploads/sounds/' . $sound->url);
            if (file_exists($file_old_url_sound)) {
                unlink($file_old_url_sound);
            }

            // Cập nhật URL âm thanh trong cơ sở dữ liệu
            $sound->url = $fileSoundName;
            $sound->save();

            return response()->json([
                'message' => 'Tải âm thanh lên thành công',
                'sound_url' => asset('uploads/sounds/' . $fileSoundName)
            ], 200);
        }

        return response()->json([
            'error' => 'Không tìm thấy tệp'
        ], 400);
    }
    public function uploadFileVideo(Request $request, $id)
    {
        $fileVideo = $request->file('video');
        $video = Video::find($id);

        if ($video && $fileVideo) {
            // Xử lý tải lên âm thanh
            $fileVideoName = time() . '-' . $fileVideo->getClientOriginalName();
            $fileVideo->move(public_path('uploads/videos/'), $fileVideoName);

            // Xóa tệp âm thanh cũ nếu nó tồn tại
            $file_old_url_video = public_path('uploads/videos/' . $video->url);
            if (file_exists($file_old_url_video)) {
                unlink($file_old_url_video);
            }

            // Cập nhật URL âm thanh trong cơ sở dữ liệu
            $video->url = $fileVideoName;
            $video->save();

            return response()->json([
                'message' => 'Tải âm thanh lên thành công',
                'video_url' => asset('uploads/videos/' . $fileVideoName)
            ], 200);
        }

        return response()->json([
            'error' => 'Không tìm thấy tệp'
        ], 400);
    }

    public function deleteFileImage($id)
    {
        // Tìm hình ảnh dựa trên ID
        $image = Image::find($id);

        if ($image) {
            // Xóa tệp hình ảnh
            $file_old_url_image = public_path('uploads/imageDetail/' . $image->url);
            if (file_exists($file_old_url_image)) {
                unlink($file_old_url_image);
            }

            // Xóa khỏi cơ sở dữ liệu
            $image->delete();
        }

        // Chuyển hướng trở lại trang trước
        return redirect()->back();
    }


    public function deleteFileSound($id)
    {
        // Tìm âm thanh dựa trên ID
        $sound = Sound::find($id);

        if ($sound) {
            // Xóa tệp âm thanh
            $file_old_url_sound = public_path('uploads/sounds/' . $sound->url);
            if (file_exists($file_old_url_sound)) {
                unlink($file_old_url_sound);
            }

            // Xóa khỏi cơ sở dữ liệu
            $sound->delete();
        }

        // Chuyển hướng trở lại trang trước
        return redirect()->back();
    }
    public function deleteFileVideo($id)
    {
        // Tìm âm thanh dựa trên ID
        $video = Video::find($id);

        if ($video) {
            // Xóa tệp âm thanh
            $file_old_url_video = public_path('uploads/videos/' . $video->url);
            if (file_exists($file_old_url_video)) {
                unlink($file_old_url_video);
            }

            // Xóa khỏi cơ sở dữ liệu
            $video->delete();
        }

        // Chuyển hướng trở lại trang trước
        return redirect()->back();
    }
}