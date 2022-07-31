<?php

namespace App\Http\Requests\FrontendRequest;

use Illuminate\Foundation\Http\FormRequest;

class BillingRequest extends FormRequest
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
            'street_address' => 'required',
            'city' => 'required',
            'state' => 'required',
            'zipcode' => 'required',
            'country' => 'required',
            'payment_method' => 'required',
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

            'street_address.required' => 'Sreet Address is required!',

            'city.required' => 'City is required!',

            'state.required' => 'State is required!',

            'zipcode.required' => 'Zipcode is required!',

            'country.required' => 'Country is required!',

            'payment_method.required' => 'Payment Method is required!',

        ];
    }
}
