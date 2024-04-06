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
        $title = fake()->sentence(4);

        return [
            'title' => $title,
            'slug' => str($title)->slug()->toString(),
            'description' => fake()->text(),
            'body' => fake()->text(2000),
            'cover' => 'sample/images/' . rand(1, 8) . '.jpg',
            'category_id' => rand(1, 10),
            'user_id' => rand(1, 11)
        ];
    }
}
