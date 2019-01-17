<?php

namespace Modules\Categories\Database\Seeders\Test;

use Illuminate\Database\Seeder;
use Modules\Categories\Entities\Category;

class TestCategoriesTableSeeder extends Seeder
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
