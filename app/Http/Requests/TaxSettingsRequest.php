<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaxSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'country' => 'required',
            'post_code' => 'required',
            'state' => 'required',
            'city' => 'required',
            'tax_rate' => 'required|min:1|max:6',
        ];
    }

    public function messages()
    {
        return [
            'country.required' => 'Country is required!',
            'post_code.required' => 'Post code is required!',
            'state.required' => 'State is required!',
            'city.required' => 'City is required!',
            'tax_rate.required' => 'Tax rate is required!',
            'tax_rate.min' => 'Min value is 1',
            'tax_rate.max' => 'Max value is 7',

        ];
    }
}
