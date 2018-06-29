<?php

use Faker\Generator as Faker;

$factory->define(App\ArticleCategory::class, function (Faker $faker) {
    return [
        'title'        => $faker->title,
        'description' => $faker->sentence,
        'pid'         => 0,
    ];
});
