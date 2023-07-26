<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'sup_id' =>fake()->numberBetween(1,4),
            'name' => fake()->words(4, true),
            'description' => fake()->words(30, true),
            'price' => fake()->numberBetween(100,5000),
            'qty' => fake()->numberBetween(10,50)
        ];
    }
}
