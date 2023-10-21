<?php

namespace App\Http\Requests\Admin\Account;

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
            'email' => 'required|email|unique:accounts,email,' . $this->id,

        ];
    }
    public function messages(): array
    {
        return [
            'email.required' => 'Please enter email',
            'email.unique' => 'Email is exist. Please choose other email',
            'email.email' => 'The email field must be a valid email address.',
        ];
    }
}