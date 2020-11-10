<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Entities\ArticleCategory;

class CategorySeederTableSeeder extends Seeder
{
  public function run()
  {
    factory(ArticleCategory::class, 5)->create();
  }
}
