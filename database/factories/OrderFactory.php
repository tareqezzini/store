<?php

namespace Database\Factories;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{

    public function definition(): array
    {
        return [
            'order_number' => $this->faker->numberBetween(),
            'user_id' => $this->faker->randomElement(User::where('role', 'costumer')->pluck('id')->toArray()),
            'product_id' => $this->faker->randomElement(Product::pluck('id')->toArray()),
            'total_amount' => $this->faker->numberBetween(5, 2000),
            'quantity' => $this->faker->numberBetween(1, 9),
            'first_name' => $this->faker->name,
            'last_name' => $this->faker->name,
            'email' => $this->faker->email(),
            'phone' => $this->faker->phoneNumber(),
            'address' => $this->faker->address,
            'country' => $this->faker->country(),
            'state' => $this->faker->city(),
            'city' => $this->faker->city(),
            'code_postal' => $this->faker->randomNumber(),
        ];
    }
}
