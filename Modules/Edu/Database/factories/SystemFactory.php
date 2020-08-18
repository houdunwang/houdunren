<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Edu\Entities\System;

$factory->define(System::class, function (Faker $faker) {
  return [
    'title' => $faker->sentence(),
    'description' => $faker->sentence(),
    'preview' => $faker->imageUrl(500, 500),
    'user_id' => 1,
    'site_id' => 1
  ];
});
