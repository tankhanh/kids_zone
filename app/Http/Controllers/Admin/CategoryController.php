<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Category\StoreRequest;
use App\Http\Requests\Admin\Category\UpdateRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $categories = Category::orderby('created_at', 'DESC')->get();
        return view('admin.modules.category.index', [
            'categories' => $categories,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.modules.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRequest $request)
    {
        //
        $category = new Category();
        
        $category->category_name = $request->category_name;

        $file = $request->category_Background;

        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($category->category_Background)) {
                $old_image_path = public_path('uploads/background/' . $category->category_Background);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'category_Background' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
            ], [
                'category_Background.required' => 'Please enter Image',
                'category_Background.mimes' => 'Images must be jpeg, png, jpg, svg',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $category->category_Background = $fileName;
            $file->move(public_path('uploads/background/'), $fileName);
        }

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Create category successfully');
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
        $category = Category::findOrFail($id);   

        return view('admin.modules.category.edit', [
            'id' => $id,
            'category' => $category
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRequest $request, string $id)
    {
        //
        $category = Category::findOrFail($id);
        
        $category->category_name = $request->category_name;
        $file = $request->category_Background;

        if (!empty($file)) {
            // Kiểm tra xem tệp hình ảnh cũ có tồn tại không
            if (!empty($category->category_Background)) {
                $old_image_path = public_path('uploads/background/' . $category->category_Background);
                if (file_exists($old_image_path)) {
                    unlink($old_image_path); // Xóa tệp hình ảnh cũ
                }
            }

            $request->validate([
                'category_Background' => 'required|mimes:jpeg,png,jpg,svg|max:2048'
            ], [
                'category_Background.required' => 'Please enter Image',
                'category_Background.mimes' => 'Images must be jpeg, png, jpg, svg',
            ]);

            $fileName = time() . '-' . $file->getClientOriginalName();
            $category->category_Background = $fileName;
            $file->move(public_path('uploads/background/'), $fileName);
        }

        $category->save();

        return redirect()->route('admin.category.index')->with('success', 'Update category successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
        $category = Category::findOrFail($id);
        foreach($category->lesson as $lesson) {
            $lesson->images()->delete();
            $lesson->sounds()->delete();
            $lesson->videos()->delete();
            $lesson->delete();
        }
        $category->delete();

        return redirect()->route('admin.category.index')->with('success', 'Delete category successfully');
    }
}