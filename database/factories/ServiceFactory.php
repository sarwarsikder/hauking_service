<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ServiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $subscription_type = array(
            array(
                'duration' => 1,
                'amount' => 100
            ),
            array(
                'duration' => 2,
                'amount' => 200
            ),
            array(
                'duration' => 3,
                'amount' => 300
            )
        );

        $kawkings_value = ["800","900","1000","Lock_1000"];

        $value_array = array("8.00 AM", "9 AM", "10 AM");
        $rand_day_value = array_rand($value_array);
        $default_value_day = array(
            'day_time' => $value_array[$rand_day_value],
            'value' => 800,

        );
        $default_value_night = array(
            'day_time' => $value_array[$rand_day_value],
            'value' => 900,

        );

        $default_value_booster = array(
            'day_time' => $value_array[$rand_day_value],
            'value' => 1000,

        );

        $frequency = array("Inner Peace", "Mental Health", "Pet Wellbeing");
        $rant_feq_value = array_rand($frequency);

        return [
            'service_name' => fake()->firstName(),
            'subscription_type' => json_encode($subscription_type),
            'trial_period' => 14,
            'hawkin_scale' => json_encode($kawkings_value),
            'data_fields' => json_encode(array()),
            'default_value_day' => json_encode($default_value_day),
            'default_value_night' => json_encode($default_value_night),
            'default_value_booster' => json_encode($default_value_booster),
            'default_special_feq' => json_encode($frequency[$rant_feq_value]),
            'service_image_url' => fake()->image(public_path('images/services'), 400, 300, null, false),
            'status' => rand(0, 1),

        ];
    }
}
