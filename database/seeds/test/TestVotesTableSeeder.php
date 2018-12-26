<?php

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
        factory(App\Domain\Votes\Models\Vote::class, 50)->create();
    }
}
