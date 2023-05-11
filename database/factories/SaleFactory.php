<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sale>
 */
class SaleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'total_items' => '1',
            'total_price' => fake()->numberBetween(1050, 3050),
            'user_id' => '1',
            'created_at' => fake()->dateTimeInInterval('-2 weeks', '+15 days'),
        ];
    }
}
