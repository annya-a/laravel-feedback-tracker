<?php

namespace Modules\Comments\Database\Seeders\Test;

use Illuminate\Database\Seeder;

class TestCommentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Modules\Comments\Entities\Comment::class, 500)->create();
    }
}
