<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\User;
use Faker\Generator as Faker;
use Modules\Article\Entities\ArticleCategory;
use Modules\Article\Entities\ArticleContent;

$factory->define(ArticleContent::class, function (Faker $faker) {
  return [
    'site_id' => 1,
    'user_id' => User::orderBy(DB::raw('RAND()'))->first()->id,
    'category_id' => ArticleCategory::orderBy(DB::raw('RAND()'))->first()->id,
    'title' => $faker->sentence(),
    'thumb' => $faker->imageUrl(300, 300),
    'description' => $faker->sentence(10),
    'content' => $faker->realText(),
    'source' => '后盾人',
    'author' => '向军',
    'created_at' => $faker->dateTimeInInterval('-2 years', '+100 days', 'PRC'),
    'updated_at' => $faker->dateTimeInInterval('-1 years', '+100 days', 'PRC')
  ];
});
