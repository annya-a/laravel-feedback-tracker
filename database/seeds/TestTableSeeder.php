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
        $this->call(TestFeaturesTableSeeder::class);
    }
}
