<?php

namespace Database\Factories;
use  App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{

    public function definition(): array
    {
        return [

            'name' => fake()->name(),
            'description' => fake()->paragraph(),
            'price' => fake()->randomFloat(2, 100, 100000),
            'category_id' => Category::inRandomOrder()->first()->id
        ];

    }
}
