<?php

use Faker\Generator as Faker;

$factory->define(App\Domain\Categories\Models\Category::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(3),
    ];
});
