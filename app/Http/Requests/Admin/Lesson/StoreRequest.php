<?php

namespace App\Http\Requests\Admin\Lesson;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'age' => 'required',
            'category_id' => 'required',
            'mainImage' => 'required',
            'package_id' => 'required',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'Please enter title',
            'description.required' => 'Please enter description',
            'age.required' => 'Please enter age',
            'mainImage.required' => 'Please enter mainImage',
            'category_id.required' => 'Please enter category_id',
            'package_id.required' => 'Please enter package_id',
        ];
    }
}