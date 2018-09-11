<?php

use Faker\Generator as Faker;

$factory->define(App\Models\Article::class, function (Faker $faker) {
    return [
        'title'   => $faker->sentence,
        'content' => $faker->text,
        'user_id' => array_random([1, 2]),
    ];
});
