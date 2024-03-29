<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Soft>
 */
class SoftFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "title" => $this->faker->word(),
            "name" => $this->faker->word(),
            "description" => $this->faker->sentence(),
            "preview" => $this->faker->imageUrl("300x300"),
            "content" => $this->faker->paragraph()
        ];
    }
}
