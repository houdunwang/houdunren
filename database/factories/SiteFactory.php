<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Models\Site;
use Illuminate\Support\Arr;

$factory->define(Site::class, function (Faker $faker) {
  return [
    'name' => $faker->name(),
    'description' => $faker->sentence(),
    'domain' => 'http://' . $faker->domainName,
  ];
});
