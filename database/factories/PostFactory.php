<?php

use Faker\Generator as Faker;
use Domain\Users\Models\User;

$factory->define(Domain\Posts\Models\Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'details' => $faker->text,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
