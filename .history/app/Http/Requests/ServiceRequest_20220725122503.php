<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'service_name' => 'required',
            'subscription_duration' => 'required',
            'subscription_amount' => 'required',
            'trial_period' => 'required',
            'hawkin_scale' => 'required',
            'data_fields' => 'required',
            'default_value_day_time' => 'required',
            'default_value_day_value' => 'required',
            'default_value_night' => 'required',
            'default_value_booster' => 'required',
            'default_special_feq' => 'required',
            'service_image_url' => 'required'
        ];
    }


    public function messages()
    {
        return [
            'service_name.required' => 'Service Name is required!',
            'subscription_duration.required' => 'Subscription Duration is required!',
            'subscription_amount.required' => 'Subscription Amount is required!',
            'trial_period.required' => 'Trial Period is required!',
            'hawkin_scale.required' => 'Hawkin Scale is required!',
            'data_fields.required' => 'Data Fields is required!',
            'default_value_day_time.required' => 'Default Value Day Time is required!',
            'default_value_day_value.required' => 'Default Value Day Value is required!',
            'default_value_night.required' => 'Default Value night is required!',
            'default_value_booster.required' => 'Default Value Booster is required!',
            'default_special_feq.required' => 'default Special Feq is required!',
            'service_image_url.required' => 'Service Image Url is required!',
        ];
    }

}
