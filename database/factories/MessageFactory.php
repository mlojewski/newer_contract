<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Message>
 */
class MessageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => fake()->streetAddress,
            'message_content' => fake()->text,
            'is_viewed' => false,
            'sender' => null,
            'recipient' => null,
            'created_at' => now()->subDay(),
            'updated_at' => now(),
        ];
    }
}
