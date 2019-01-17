<?php

namespace Modules\Votes\Database\Seeders\Test;

use Illuminate\Database\Seeder;

class TestVotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\Modules\Votes\Entities\Vote::class, 3000)->create();
    }
}
