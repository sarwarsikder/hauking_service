<?php

namespace App\Http\Requests\FrontendRequest;

use Illuminate\Foundation\Http\FormRequest;

class RegisterUserRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'first_name' => 'required|string|min:4|max:50',
            'last_name' => 'required|string|min:4|max:25',
            'email' => 'email',
            // 'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',

        ];
    }

    public function messages()
    {
        return [
            'first_name.required' => 'First Name is required!',
            'first_name.string' => 'First Name is character!',
            'first_name.min' => 'First Name greater than 4 char!',
            'first_name.max' => 'First Name less than 25 char!',

            'last_name.required' => 'Last Name is required!',
            'last_name.string' => 'Last Name is character!',
            'last_name.min' => 'Last Name greater than 4 char!',
            'last_name.max' => 'Last Name less than 25 char!',

            'email.email' => 'Email is required!',
            // 'password.min' => 'Password minimum 6 character!',
            // 'password.required_with' => 'Confirm Password is required!',
            // 'password.same' => 'Password mismatch!',

            // 'password_confirmation.min' => 'Minimum 6 character!',
        ];
    }
}
