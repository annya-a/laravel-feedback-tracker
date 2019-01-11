<?php

use Illuminate\Database\Seeder;
use App\Domain\Categories\Models\Category;

class TestCategoriesTalbeSeeder extends Seeder
{
    /**
     * Numbers of categories to generate.
     *
     * @var int
     */
    const CATEGORY_NUMBER = 9;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $count = Category::count();
        if ($count < static::CATEGORY_NUMBER) {
            factory(Category::class, (static::CATEGORY_NUMBER - $count))->create();
        }
    }
}
