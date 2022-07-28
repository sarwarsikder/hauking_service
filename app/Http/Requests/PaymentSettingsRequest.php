<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentSettingsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'account_email' => 'required',
            'client_id' => 'required',
            'client_secret_key' => 'required',
            'test_public_key' => 'required',
            'test_secret_key' => 'required',
            'live_public_key' => 'required',
            'live_secret_key' => 'required',
        ];
    }

    public function messages()
    {
        return [

            'account_email.required' => 'Account Email is required!',
            'client_id.required' => 'Client id is required!',
            'client_secret_key.required' => 'Client secret key is required!',
            'test_public_key.required' => 'Test public key is required!',
            'test_secret_key.required' => 'Test secret key is required!',
            'live_public_key.required' => 'Live public key is required!',
            'live_secret_key.required' => 'Live secret key is required!',

        ];
    }
}
