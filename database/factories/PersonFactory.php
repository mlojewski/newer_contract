<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Person>
 */
class PersonFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => 'jurek',
            'last_name' => 'ogórek',
            'residence' => fake()->city(),
            'birth_date' => fake()->date(),
            'video_url' => fake()->address(),
            'fb_url' => fake()->address(),
            'ig_url' => fake()->address(),
            'sport_additional' => fake()->text(15),
            'career' => fake()->realText(190),
            'achievements' => fake()->realText(189),
            'billing_address' => fake()->country(),
            'tax_id' => fake()->numberBetween(1111111111, 3333333333),
            'gender_id' => 1,
            'country_id' => 1,
            'sport_id' => 1,
            'person_type_id' => 1
        ];
    }
}
