<?php

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
        factory(App\Domain\Comments\Models\Comment::class, 10)->create();
    }
}
