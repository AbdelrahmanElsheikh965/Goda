<?php

namespace Database\Factories\ECommerce\Client\Models;

use App\ECommerce\Client\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\ECommerce\Client\Models\Client>
 */
class ClientFactory extends Factory
{
    protected $model = Client::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'first_name'    => fake()->firstName,
            'last_name'     => fake()->lastName,
            'email'         => fake()->email,
            'password'      => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password,
            'gender'        => fake()->randomElement(['male', 'female'])
        ];
    }
}
