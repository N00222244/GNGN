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
            'heading' => $faker->sentence(3),
            'subheading' => $faker->sentence(4),
            'category' => $faker->word,
            'body' => $faker->sentence(10),
            'pub_date' => $faker->date,
            'img_src' => $faker->imageUrl(),
            'refernces' => $faker->sentence(1),

        ];
    }
}
