<?php

namespace Database\Factories;

use App\Models\City;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class TaxFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $state = State::all()->random(1)->first();
        return [
            'tax_type' => 'local',
            'country_id' => 231,
            'state_id' => $state->id,
            'post_code' => fake()->postcode(),
            'tax_rate' => rand(5, 20),
        ];
    }
}
