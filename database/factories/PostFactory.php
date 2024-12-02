<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->text(20),
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraph(1),
            'price' => fake()->randomFloat(2, 5, 100),
            'view' => rand(1, 100),
            'category_id' => rand(1, 4),
        ];
    }
}
