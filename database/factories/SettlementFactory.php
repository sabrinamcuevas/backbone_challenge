<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Settlement>
 */
class SettlementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'key' =>  fake()->unique()->randomDigit(),
            'name' => fake()->name(),
            'zone_type' => fake()->text(),
            'settlement_type_id' => 1,
            'municipality_id' => 1,
            'zip_code_id' => 1
        ];
    }
}
