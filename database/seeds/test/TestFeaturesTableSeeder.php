<?php

use Illuminate\Database\Seeder;

class TestFeaturesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Domain\Features\Models\Feature::class, 10)->create();
    }
}
