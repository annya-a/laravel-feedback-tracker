<?php

use Faker\Generator as Faker;
use App\Domain\Users\Models\User;
use App\Domain\Posts\Models\Post;

$factory->define(App\Domain\Votes\Models\Vote::class, function (Faker $faker) {
    return [
        'post_id' => Post::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
