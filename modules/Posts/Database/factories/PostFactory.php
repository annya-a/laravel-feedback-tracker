<?php

use Faker\Generator as Faker;
use Modules\Users\Entities\User;
use Modules\Categories\Entities\Category;

$factory->define(Modules\Posts\Entities\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'details' => $faker->text,
        'user_id' => User::inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
        'status' => $faker->numberBetween(0, 2),
    ];
});
