<?php

namespace Database\Factories;

use App\Models\Discounts;
use App\Models\Categories;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(3, true),
            'description_product' => $this->faker->paragraph(),
            'image' => 'default_image' . 'jpg',
            'price' => rand(9.99, 100),
            'quantity' => rand(1, 100),
            'category_id' => rand(1, Categories::count()),
            'discount_id' => rand(1, Discounts::count())
        ];
    }
}
