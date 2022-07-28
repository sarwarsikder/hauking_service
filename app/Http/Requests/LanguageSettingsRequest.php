<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LanguageSettingsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'language_name' => 'required|string|min:4|max:50',
            'slug' => 'required',
            'display_order' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'language_name.required' => 'Language Name is required!',
            'slug.required' => 'Language slug is required!',
            'display_order.required' => 'Language Value is required!',
        ];
    }
}
