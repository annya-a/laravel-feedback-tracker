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
        $categories = [
            'bugs' => 'Bugs',
            'features' => 'Features',
            'improvements' => 'Improvements'
        ];

        foreach ($categories as $name => $title) {
            Category:: firstOrCreate(['name' => $name, 'title' => $title]);
        }
    }
}
