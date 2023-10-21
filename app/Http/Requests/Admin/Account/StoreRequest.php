<?php

namespace App\Http\Requests\Admin\Account;

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
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|confirmed|min:8'
        ];
    }

    public function messages(): array
    {
        return [
            'email.required' => 'Please enter email',
            'email.unique' => 'Email is exist. Please choose other email',
            'email.email' => 'The email field must be a valid email address.',
            'email.min'=> 'The password field must be at least 8 characters.', 
            'password.required' => 'Please enter password',
            'password.confirmed' => 'Confirmation password doesn\'t match',
        ];
    }
}