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
           'featured_title' => 'Promoted Ads',
            'featured_content' => 'Check out the ads from our most loyal partners.',
            'top_sports_title' => 'Top sports',
            'top_sports_content' => 'Check out which sports provide our users with most opportunities.',
            'partners_title' => '5 latest ads',
            'partners_content' => 'Check out our 5 recently added ads',
            'top_countries_title' => 'top countries title',
            'top_countries_content' => 'top countries content'.fake()->text(150),
            'blog_title' => 'Blog part title',
            'blog_content' => 'blog part content '.fake()->text(150),
            'dual_title' => 'dual part title',
            'dual_content' => 'dual part content'.fake()->text(150),
            'pricing_title' => 'pricing title',
            'pricing_content' => 'PICING part content '.fake()->text(150)
        ];
    }
}
