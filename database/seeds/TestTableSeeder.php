<?php

use Illuminate\Database\Seeder;
use Modules\Users\Database\Seeders\Test\TestUsersTableSeeder;
use Modules\Categories\Database\Seeders\Test\TestCategoriesTableSeeder;
use Modules\Posts\Database\Seeders\Test\TestPostsTableSeeder;
use Modules\Comments\Database\Seeders\Test\TestCommentsTableSeeder;
use Modules\Votes\Database\Seeders\Test\TestVotesTableSeeder;

class TestTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TestUsersTableSeeder::class);
        $this->call(TestCategoriesTableSeeder::class);
        $this->call(TestPostsTableSeeder::class);
        $this->call(TestCommentsTableSeeder::class);
        $this->call(TestVotesTableSeeder::class);
    }
}
