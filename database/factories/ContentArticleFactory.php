<?php

use Faker\Generator as Faker;

$factory->define(\App\Models\ContentArticle::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'category_id'=>1,
        'content'=>$faker->text,
        'user_id'=>1
    ];
});
