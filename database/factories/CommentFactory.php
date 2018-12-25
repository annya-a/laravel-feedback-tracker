<?php

use Faker\Generator as Faker;
use App\Domain\Users\Models\User;
use App\Domain\Posts\Models\Post;

$factory->define(App\Domain\Comments\Models\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->sentences(3, true),
        'post_id' => Post::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
