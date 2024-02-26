<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->title(),
            'image' => $this->faker->imageUrl('100', '1000'),
            'is_parent' => $this->faker->randomElement([true, false]),
            'summary' => $this->faker->sentence(3, true),
            'status' => $this->faker->randomElement(['active', 'inactive']),
            'parent_id' => $this->faker->randomElement(Category::pluck('id')->toArray()),
        ];
    }
}