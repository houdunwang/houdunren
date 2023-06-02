<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Package>
 */
class PackageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => fake()->name(),
            'ad' => fake()->sentence(3),
            'price' => 200,
            "original_price" => 999,
            "months" => 12,
            "icon" => fake()->imageUrl("100x100")
        ];
    }
}
