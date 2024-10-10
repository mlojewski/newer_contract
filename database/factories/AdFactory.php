<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ad>
 */
class AdFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_author_hidden' => false,
            'is_promoted' => false,
            'ad_content' => fake()->realText(200),
            'requirements' => fake()->realText(150),
            'title' => fake()->realText(20),
            'salary' => rand(40, 2345),
            'salary_per' => fake()->dayOfWeek,
            'is_valid' => true,
            'city_id' => rand(1, 7),
            'sport_id' => rand(1, 5),
            'is_dual' => false,
            'dual_content' => fake()->realText(90),
            ];
    }
}
