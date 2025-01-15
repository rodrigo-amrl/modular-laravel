<?php

namespace Modules\Product\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\Product\Models\Product;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
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
        return [
            'name' => fake()->sentence(),
            'price_in_cents' => fake()->randomInt(100, 1000),
            'stock' => fake()->numberBetween(0, 100),
        ];
    }
}
