<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => json_encode([
                'en' => $this->faker->sentence(),
                'de' => $this->faker->sentence()
            ]),
            'text' => json_encode([
                'en' => $this->faker->paragraph(),
                'de' => $this->faker->paragraph()
            ]),
            'image' => null,
            'view_count' => $this->faker->numberBetween(0, 1000),
        ];
    }
}
