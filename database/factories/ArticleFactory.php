<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ArticleFactory  extends Factory
{

    public function definition()
    {
        return [
            'title' => fake()->sentence(),
            'body' => fake()->paragraph()
        ];
    }
}
