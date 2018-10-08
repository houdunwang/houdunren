<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ContentModel::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'fields'=>[]
    ];
});
