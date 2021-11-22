<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReviewFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'username' => $this->faker->name(),
            'book_id' => $this->faker->numberBetween(1, 100),
            'review_text' => $this->faker->realText(250),
            'rating' => $this->faker->numberBetween(1, 5)
        ];
    }
}
