<?php

use Illuminate\Database\Seeder;

class TestCategoriesTalbeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Domain\Categories\Models\Category::class, 10)->create();
    }
}
