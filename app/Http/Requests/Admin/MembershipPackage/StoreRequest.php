<?php

namespace App\Http\Requests\Admin\MembershipPackage;

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
            'package_name' => 'required|unique:membership_packages,package_name',
        ];
    }
    public function messages(): array
    {
        return [
            'package_name.required' => 'Please enter Package Name',
        ];
    }
}