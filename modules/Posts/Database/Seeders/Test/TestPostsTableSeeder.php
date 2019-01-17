<?php

namespace Modules\Posts\Database\Seeders\Test;

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
        factory(\Modules\Posts\Entities\Post::class, 100)->create();
    }
}
