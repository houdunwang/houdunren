<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Modules\Article\Entities\ArticleCategory;

$factory->define(ArticleCategory::class, function (Faker $faker) {
  return [
    'site_id' => 1,
    'user_id' => User::first(),
    'model_id' => 1,
    'pid' => 0,
    'title' => $faker->name(),
    'thumb' => $faker->imageUrl(300, 300),
    'description' => $faker->paragraph(2),
  ];
});
