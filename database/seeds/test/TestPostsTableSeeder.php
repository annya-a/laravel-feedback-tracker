<?php

use Illuminate\Database\Seeder;

class TestPostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Domain\Posts\Models\Post::class, 10)->create();
    }
}
