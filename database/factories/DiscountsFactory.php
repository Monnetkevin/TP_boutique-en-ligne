<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Discounts>
 */
class DiscountsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'discount_name' => $this->faker->words(1, true),
            'description_discount' => $this->faker->paragraph(),
            'discount_percent' => rand(10, 80),
            'active' => false
        ];
    }
}
