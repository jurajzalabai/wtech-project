<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Review;
use App\Models\Author;
use Illuminate\Database\Seeder;
use App\Models\Category;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
            Author::factory()->count(1)->create();

            Book::factory()->count(100)->create();
            Review::factory()->count(10)->create();


    }
}
