<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Modules\Edu\Entities\Topic;

$factory->define(Topic::class, function (Faker $faker) {
  return [
    'title' => $faker->sentence(),
    'content' => $faker->paragraph(),
    'user_id' => Arr::random([1, 2, 3, 4, 5]),
    'site_id' => 1
  ];
});
