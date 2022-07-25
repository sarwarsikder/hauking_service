<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CouponsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'coupon_name' => 'required|string|min:4|max:50',
            'coupon_type' => 'required',
            'coupon_value' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'coupon_name.required' => 'Coupon Name is required!',
            'coupon_type.required' => 'Coupon Type is required!',
            'coupon_value.required' => 'Coupon Value is required!',
        ];
    }

}
