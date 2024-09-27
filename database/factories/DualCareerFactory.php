<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DualCareer>
 */
class DualCareerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->streetAddress,
            'quote' => fake()->realText(),
            'before_quote' => fake()->realText(),
            'after_quote' => fake()->realText(),

        ];
    }
}
