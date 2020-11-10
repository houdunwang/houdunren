<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Article\Entities\ArticleModel;

$factory->define(ArticleModel::class, function (Faker $faker) {
  return [
    'site_id' => 1,
    'title' => $faker->word(),
    'description' => $faker->sentence(20),
  ];
});
