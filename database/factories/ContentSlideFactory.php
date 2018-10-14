<?php

use Faker\Generator as Faker;

$factory->define(App\Models\ContentSlide::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'image' => $faker->imageUrl(680, 300),
        'url' => 'http://www.houdunren.com',
    ];
});