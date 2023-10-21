<?php

namespace App\Http\Requests\Admin\MembershipPackage;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
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
            'package_name' => 'required|:membershippackages,package_name,' . $this->id,
            'price' => 'required|:membershippackages,price,',
            'expiry' => 'required|:membershippackages,expiry,',
        ];
    }
    public function messages(): array
    {
        return [
            'package_name.required' => 'Please enter Package Name',
            'price.required' => 'Please enter Price',
            'expiry.required' => 'Please enter Expiry'
        ];
    }
}