<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Supplier>
 */
class SupplierFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 'name' => fake()->words(4, true),
            // 'email' => fake()->words(30, true),
            // 'price' => fake()->numberBetween(100,5000),
            // 'qty' => fake()->numberBetween(10,50)
        ];
    }
}
