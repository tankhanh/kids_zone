<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Video\StoreRequest;
use App\Http\Requests\Admin\Video\UpdateRequest;
use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $videos = Video::orderby('created_at', 'DESC')->get();
        return view('admin.modules.video.index', [
            'videos' => $videos,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.modules.video.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $video = new Video();

        $file = $request->url;

        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($video->url)) {
                $old_video_path = public_path('uploads/videos/' . $video->url);
                if (file_exists($old_video_path)) {
                    unlink($old_video_path);
                }
            }

            $request->validate([
                'url' => 'required|file|mimes:mp4,avi,mov,wmv',
                'caption' => 'required',
            ], [
                'url.required' => 'Please upload a video file',
                'url.file' => 'The uploaded file is not valid',
                'url.mimes' => 'Video files must be mp4, avi, mov, or wmv',
                'caption.required' => 'Please enter a caption',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $video->url = $fileName;
            $file->move(public_path('uploads/videos/'), $fileName);
        }

        $video->caption = $request->caption;

        $video->save();
        return redirect()->route('admin.video.index')->with('success', 'Create video successfully');
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
        $video = Video::findOrFail($id);
        return view('admin.modules.video.edit', [
            'id' => $id,
            'video' => $video
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $video = Video::findOrFail($id);

        $file = $request->url;
        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($video->url)) {
                $old_video_path = public_path('uploads/videos/' . $video->url);
                if (file_exists($old_video_path)) {
                    unlink($old_video_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'url' => 'required|file|mimes:mp4,avi,mov,wmv',
                'caption' => 'required',
            ], [
                'url.required' => 'Please upload a video file',
                'url.file' => 'The uploaded file is not valid',
                'url.mimes' => 'Video files must be mp4, avi, mov, or wmv',
                'caption.required' => 'Please enter a caption',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $video->url = $fileName;
            $file->move(public_path('uploads/videos/'), $fileName);
        }
        $video->caption = $request->caption;
        $video->save();

        return redirect()->route('admin.video.index')->with('success', 'Update video successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $video = Video::findOrFail($id);

        $videoPath = public_path('uploads/videos/' . $video->url);
    if (file_exists($videoPath)) {
        unlink($videoPath);
    }
        $video->delete();

        return redirect()->route('admin.video.index')->with('success', 'Delete video successfully');
    }
}