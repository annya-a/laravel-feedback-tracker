<?php

use Illuminate\Database\Seeder;

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
        $this->call(TestCategoriesTalbeSeeder::class);
        $this->call(TestPostsTableSeeder::class);
        $this->call(TestCommentsTableSeeder::class);
        $this->call(TestVotesTableSeeder::class);
    }
}
