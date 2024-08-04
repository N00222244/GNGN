<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'heading' => fake()->sentence,
            'subheading' => fake()->sentence,
            'category' => fake()->word,
            'body' => fake()->sentence,
            'pub_date' => fake()->date,
            'img_src' => fake()->imageUrl,
            'refernces' => fake()->sentence,

        ];
    }
}
