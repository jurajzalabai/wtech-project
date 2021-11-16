<?php

namespace Database\Seeders;

use App\Models\Book;
use App\Models\Author;
use App\Models\Review;
use App\Models\User;
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
        // \App\Models\User::factory(10)->create();
//         \App\Models\Author::factory(1)->create();
//        User::factory()->count(10)->create();

        Author::factory()->create();
        Book::factory()->count(100)->create();
        Review::factory()->count(10)->create();
    }
}
