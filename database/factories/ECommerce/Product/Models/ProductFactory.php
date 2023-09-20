<?php

namespace Database\Factories\ECommerce\Product\Models;

use App\ECommerce\Product\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\ECommerce\Product\Models\Product>
 */
class ProductFactory extends Factory
{
    protected $model = Product::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoriesIDs = Category::pluck('id');
        return [
            'name'          => fake()->word(),
            'description'   => fake()->sentence(),
            'price'         => fake()->numberBetween(50, 350),
            'discount'      => (fake()->boolean(30) ? fake()->randomFloat(1, 0.1, 0.4) : NULL),
            'size'          => ['35', '42', '45', '51', '55'],
            'category_id'   => fake()->randomElement($categoriesIDs)
        ];
    }
}
