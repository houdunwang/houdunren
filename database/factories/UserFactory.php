<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'avatar' => fake()->imageUrl('300x300'),
            'sex' => mt_rand(1, 2),
            'email_verified_at' => now(),
            'password' => Hash::make('admin888'),
            'remember_token' => Str::random(10),
            'github' => fake()->url(),
            'email' => fake()->email(),
            'home' => fake()->url(),
            'weibo' => fake()->url(),
            'wechat' => fake()->url(),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
