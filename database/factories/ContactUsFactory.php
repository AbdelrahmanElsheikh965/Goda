<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ContactUs>
 */
class ContactUsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'address'   => fake()->unique()->streetAddress(),
            'phone'     => fake()->unique()->phoneNumber(),
            'email'     => fake()->unique()->safeEmail(),
            'fb_link'   => fake()->url(),
            'wa_link'   => fake()->phoneNumber(),
        ];
    }
}
