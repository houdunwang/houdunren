<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use App\Models\Site;

$factory->define(Site::class, function (Faker $faker) {
  return [
    'name' => $faker->name(),
    'description' => $faker->sentence(),
    'domain' => 'http://' . $faker->domainName,
    'user_id' => Arr::random([1, 2, 3])];
});
