<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\SiteUser;
use Faker\Generator as Faker;
use Illuminate\Support\Arr;

$factory->define(SiteUser::class, function (Faker $faker) {
    return [
        'role' => 'admin',
        'user_id' => Arr::random([1, 2, 3]),
        'site_id' => Arr::random([1, 2, 3])
    ];
});
