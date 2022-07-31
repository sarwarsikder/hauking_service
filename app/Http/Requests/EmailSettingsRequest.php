<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmailSettingsRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'email_subject' => 'required',
            'email_body' => 'required',

        ];
    }


    public function messages()
    {
        return [
            'email_subject.required' => 'E-Mail subject is required!',
            'email_body.required' => 'E-Mail body is required!',
        ];
    }

}
