<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Home>
 */
class HomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'featured_title' => fake()->text(30),
            'featured_content' => fake()->text(150),
            'top_sports_title' => fake()->text(30),
            'top_sports_content' => fake()->text(150),
            'partners_title' => fake()->text(30),
            'partners_content' => fake()->text(150),
            'top_countries_title' => fake()->text(30),
            'top_countries_content' => fake()->text(150),
            'blog_title' => fake()->text(30),
            'blog_content' => fake()->text(150),
            'dual_title' => fake()->text(30),
            'dual_content' => fake()->text(150),
            'pricing_title' => fake()->text(30),
            'pricing_content' => fake()->text(150)
        ];
    }
}
