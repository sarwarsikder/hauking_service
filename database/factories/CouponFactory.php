<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $value_array = array("fixed", "percent", "days");
        $rand_day_value = array_rand($value_array);

        return [
            'coupon_name' => fake()->name(),
            'coupon_type' => $value_array[$rand_day_value],
            'coupon_value' => rand(10, 50),
        ];
    }
}
