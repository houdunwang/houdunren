<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Modules\Edu\Entities\Lesson;

$factory->define(Lesson::class, function (Faker $faker) {
  return [
    'title' => $faker->sentence(),
    'site_id' => 1,
    'user_id' => 1,
    'description' => $faker->sentence(),
    'thumb' => '/images/member-login.jpg',
    'type' => 'project',
  ];
});
