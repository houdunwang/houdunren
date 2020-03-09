<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Edu\Entities\Lesson;

$factory->define(Lesson::class, function (Faker $faker) {
  return [
    'title' => $faker->title(),
    'site_id' => 1,
    'user_id' => 1,
    'description' => $faker->sentence(),
    // 'thumb' => $faker->image(null, 200, 200),
    'type' => 'project',
  ];
});
