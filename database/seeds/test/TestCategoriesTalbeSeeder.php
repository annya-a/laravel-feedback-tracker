<?php

use Illuminate\Database\Seeder;
use App\Domain\Categories\Models\Category;

class TestCategoriesTalbeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = ['Bugs', 'Features', 'Improvements'];

        foreach ($categories as $category) {
            Category:: firstOrCreate(['title' => $category]);
        }
    }
}
