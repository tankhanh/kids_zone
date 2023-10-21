<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Image\StoreRequest;
use App\Http\Requests\Admin\Image\UpdateRequest;
use App\Models\Image;
use App\Models\Lesson;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $images = Image::orderby('created_at', 'DESC')->get();
        return view('admin.modules.image.index', [
            'images' => $images,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $lessons = Lesson::get();
        return view('admin.modules.image.create', [
            'lessons' => $lessons
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $image = new Image();

        $file = $request->url;

        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($image->url)) {
                $old_image_path = public_path('uploads/imageDetail/' . $image->url);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'url' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
            ], [
                'url.required' => 'Please enter Image',
                'url.mimes' => 'Images must be jpeg, png, jpg, svg',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $image->url = $fileName;
            $file->move(public_path('uploads/imageDetail/'), $fileName);
        }

        $image->caption = $request->caption;
        $image->lesson = $request->lesson;

        $image->save();
        return redirect()->route('admin.image.index')->with('success', 'Create image successfully');
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

        $image = Image::findOrFail($id);
        return view('admin.modules.image.edit', [
            'id' => $id,
            'image' => $image
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $image = Image::findOrFail($id);

        $file = $request->url;
        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($image->url)) {
                $old_image_path = public_path('uploads/images/' . $image->url);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'url' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
            ], [
                'url.required' => 'Please enter Image',
                'url.mimes' => 'Images must be jpeg, png, jpg, svg',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $image->url = $fileName;
            $file->move(public_path('uploads/images/'), $fileName);
        }
        $image->caption = $request->caption;
        $image->lessonDetail = $request->lessonDetail;

        $image->save();

        return redirect()->route('admin.image.index')->with('success', 'Update image successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $image = Image::findOrFail($id);
        $imagePath = public_path('uploads/imageDetail/' . $image->url);
        if (file_exists($imagePath)) {
            unlink($imagePath);
        }
        $image->delete();

        return redirect()->route('admin.image.index')->with('success', 'Delete image successfully');
    }
}