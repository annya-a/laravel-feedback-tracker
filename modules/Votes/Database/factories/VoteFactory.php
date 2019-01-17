<?php

use Faker\Generator as Faker;
use Modules\Users\Entities\User;
use Modules\Posts\Entities\Post;

$factory->define(Modules\Votes\Entities\Vote::class, function (Faker $faker) {
    return [
        'post_id' => Post::inRandomOrder()->first()->id,
        'user_id' => User::inRandomOrder()->first()->id,
    ];
});
