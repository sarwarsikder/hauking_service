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
            'post_code' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'post_code.required' => 'Post code is required!',

        ];
    }
}
