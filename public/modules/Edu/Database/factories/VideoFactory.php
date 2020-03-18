<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Arr;
use Modules\Edu\Entities\Video;

$factory->define(Video::class, function (Faker $faker) {
  $videos = [
    'https://test-hdcms.oss-cn-hangzhou.aliyuncs.com/1.mp4',
    'https://test-hdcms.oss-cn-hangzhou.aliyuncs.com/2.mp4'
  ];
  return [
    'title' => $faker->sentence(),
    'site_id' => 1,
    'lesson_id' => Arr::random([48, 49, 50]),
    'path' => Arr::random($videos)
  ];
});
