<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $bindingTypes = ['Pevna vazba', 'Makka vazba'];
        $languages = ['Slovensky', 'Cesky', 'Anglicky', 'Polsky'];
        $photoPaths = ['img/book1.png', 'img/book2.png', 'img/book3.png'];
        return [
            'title' => $this->faker->realText(64),
            'publisher' => $this->faker->company,
            'description' => $this->faker->realText(350),
            'price' => $this->faker->numberBetween(500, 20000)/100,
            'number_of_pages' => $this->faker->numberBetween(50, 1000),
            'rating' => $this->faker->numberBetween(0, 5),
            'sold_count' => $this->faker->numberBetween(0, 10000),
            'publish_date' => $this->faker->dateTime,
            'reading_time' => $this->faker->dateTime,
            'binding_type' => Arr::random($bindingTypes),
            'language' => Arr::random($languages),
            'stock_level' => $this->faker->numberBetween(0,1000),
            'photo_path' => Arr::random($photoPaths),
            'active' => $this->faker->boolean,
            'author_id' => 1,
            'category_id' => 1,
        ];
    }
}
