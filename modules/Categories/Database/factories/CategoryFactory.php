<?php

use Faker\Generator as Faker;

$factory->define(Modules\Categories\Entities\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->word,
    ];
});
