<?php

use Faker\Generator as Faker;
use Modules\Users\Entities\User;
use Modules\Posts\Entities\Post;

$factory->define(Modules\Comments\Entities\Comment::class, function (Faker $faker) {
    return [
        'text' => $faker->sentences(3, true),
        'post_id' => Post::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
