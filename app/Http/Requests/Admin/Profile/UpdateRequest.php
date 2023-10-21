<?php

namespace App\Http\Requests\Admin\Profile;

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
            'birthday' => 'required|:users,birthday,' . $this->id,
            'firstname' => 'required|:users,firstname',
            'lastname' => 'required|:users,lastname',
            'gender' => 'required|:users,gender,'
        ];
    }

    public function messages(): array
    {
        return [
            'firstname.required' => 'Please enter your First Name',
            'lastname.required' => 'Please enter your Last Name',
            'birthday.required' => 'Please enter Birthday',
            'gender.required' => 'Please enter Gender'
        ];
    }
}