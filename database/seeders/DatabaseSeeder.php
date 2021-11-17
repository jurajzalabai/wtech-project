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
        Author::factory()->count(50)->create();
        Book::factory()->count(100)->create();
        Review::factory()->count(10)->create();
        $this->createCategories();
    }

    public function createCategories(){
        $main_categories = ['Beletria', 'Náučná literatúra', 'Pre deti a mládež'];
        $beletria_subcategories = ['Slovenská beletria', ' Detektívky','Sci-Fi', 'Historické', 'Klasika', 'Romantika'];
        $naucna_subcategories = ['História', 'Technika', 'Zdravie a životný štýl', 'Hobby', 'Motivačná literatúra'];
        $pre_deti_subcategories = ['Pre najmenších', 'Pre prvákov', 'Pre teenagerov', 'Sci-Fi', 'Fantasy'];


        foreach($main_categories as $main_category) {
            Category::create([
                'name' => $main_category,
                'parent_id' => null,
            ]);
        }
        foreach($beletria_subcategories as $category) {
            Category::create([
                'name' => $category,
                'parent_id' => 1,
            ]);
        }
        foreach($naucna_subcategories as $category) {
            Category::create([
                'name' => $category,
                'parent_id' => 2,
            ]);
        }
        foreach($pre_deti_subcategories as $category) {
            Category::create([
                'name' => $category,
                'parent_id' => 3,
            ]);
        }
    }
}
