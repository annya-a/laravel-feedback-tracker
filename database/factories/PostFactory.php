<?php

use Faker\Generator as Faker;
use App\Domain\Users\Models\User;
use App\Domain\Categories\Models\Category;

$factory->define(App\Domain\Posts\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'details' => $faker->text,
        'user_id' => User::inRandomOrder()->first()->id,
        'category_id' => Category::inRandomOrder()->first()->id,
    ];
});
