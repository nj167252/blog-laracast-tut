<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use App\Models\Category;

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
    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'category_id' => Category::factory(),
            'slug' => fake()->unique()->slug(),
            'title' => fake()->sentence(),
            'excerpt' => '<p>' . implode('</p><p>' , fake()->paragraphs(3)) . '</p>',
            'body' => '<p>' . implode('</p><p>' , fake()->paragraphs(6)) . '</p>',
        ];
    }
}
