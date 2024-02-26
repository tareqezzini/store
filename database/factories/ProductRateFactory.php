<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductRate>
 */
class ProductRateFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id'  => $this->faker->randomElement(User::where('role', 'costumer')->pluck('id')->toArray()),
            'product_id' => $this->faker->randomElement(Product::pluck('id')->toArray()),
            'rate' => $this->faker->numberBetween(1, 5),
            'comment' => $this->faker->text(30),
        ];
    }
}
