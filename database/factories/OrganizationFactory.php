<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Organization>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->text(20),
            'www_url' => fake()->address(),
            'fb_url' => fake()->address(),
            'ig_url' => fake()->address(),
            'li_url' => fake()->address(),
            'location' => fake() ->city(),
            'description' => fake()->realText(190),
            'billing_address' => fake()->country(),
            'tax_id' => fake()->numberBetween(1111111111, 3333333333),
            'organization_type_id' => 1
        ];
    }
}
