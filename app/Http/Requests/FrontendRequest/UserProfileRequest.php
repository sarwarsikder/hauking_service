<?php

namespace App\Http\Requests\FrontendRequest;

use Illuminate\Foundation\Http\FormRequest;

class UserProfileRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'first_name' => 'required|string|min:4|max:50',
            'last_name' => 'required|string|min:4|max:25',
            'primary_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'phone' => 'required',
            'email' => 'email',
            // 'password' => 'min:6|required_with:password_confirmation|same:password_confirmation',
            // 'password_confirmation' => 'min:6',
            // 'user_profile' => 'required',
            'user_bio' => 'required'

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

            'primary_address.required' => 'Primary Address is required!',

            'city.required' => 'City is required!',

            'state.required' => 'State is required!',

            'zipcode.required' => 'Zipcode is required!',

            'country.required' => 'Country is required!',

            'email.email' => 'Email is required!',

            'phone.required' => 'Phone is required!',
            
            // 'user_profile.required' => 'User profile image is required!',
            
            // 'password.min' => 'Password minimum 6 character!',
            // 'password.required_with' => 'Confirm Password is required!',
            // 'password.same' => 'Password mismatch!',
            
            // 'password_confirmation.min' => 'Minimum 6 character!',
            'user_bio.required' => 'User Bio is required!',
        ];
    }
}
