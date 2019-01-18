<?php

use Faker\Generator as Faker;
use Modules\Users\Entities\User;
use Modules\Posts\Entities\Post;
use Modules\Votes\Entities\Vote;

$factory->define(Vote::class, function (Faker $faker, $attributes) {
    return [
        'post_id' => $attributes['post_id'],
        'user_id' => $attributes['user_id'],
    ];
});
