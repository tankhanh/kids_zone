<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Sound\StoreRequest;
use App\Http\Requests\Admin\Sound\UpdateRequest;
use App\Models\Sound;
use Illuminate\Http\Request;

class SoundController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $sounds = Sound::orderby('created_at', 'DESC')->get();
        return view('admin.modules.sound.index', [
            'sounds' => $sounds,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.modules.sound.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $sound = new Sound();

        $file = $request->url;

        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($sound->url)) {
                $old_sound_path = public_path('uploads/sounds/' . $sound->url);
                if (file_exists($old_sound_path)) {
                    unlink($old_sound_path);
                }
            }

            $request->validate([
                'url' => 'required|file|mimes:mp3,wav',
                'caption' => 'required',
            ], [
                'url.required' => 'Please upload a sound file',
                'url.file' => 'The uploaded file is not valid',
                'url.mimes' => 'Sound files must be mp3 or wav',
                'caption.required' => 'Please enter a caption',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $sound->url = $fileName;
            $file->move(public_path('uploads/sounds/'), $fileName);
        }

        $sound->caption = $request->caption;

        $sound->save();
        return redirect()->route('admin.sound.index')->with('success', 'Create sound successfully');
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
        $sound = Sound::findOrFail($id);
        return view('admin.modules.sound.edit', [
            'id' => $id,
            'sound' => $sound
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $sound = Sound::findOrFail($id);

        $file = $request->url;
        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($sound->url)) {
                $old_sound_path = public_path('uploads/sounds/' . $sound->url);
                if (file_exists($old_sound_path)) {
                    unlink($old_sound_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'url' => 'required|file|mimes:mp3,wav',
                'caption' => 'required',
            ], [
                'url.required' => 'Please upload a sound file',
                'url.file' => 'The uploaded file is not valid',
                'url.mimes' => 'Sound files must be mp3 or wav',
                'caption.required' => 'Please enter a caption',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $sound->url = $fileName;
            $file->move(public_path('uploads/sounds/'), $fileName);
        }
        $sound->caption = $request->caption;
        $sound->save();

        return redirect()->route('admin.sound.index')->with('success', 'Update sound successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $sound = Sound::findOrFail($id);
        $soundPath = public_path('uploads/sounds/' . $sound->url);
    if (file_exists($soundPath)) {
        unlink($soundPath);
    }
        $sound->delete();

        return redirect()->route('admin.sound.index')->with('success', 'Delete sound successfully');
    }
}