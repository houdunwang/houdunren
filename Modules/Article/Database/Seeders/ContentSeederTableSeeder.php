<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Entities\ArticleContent;

class ContentSeederTableSeeder extends Seeder
{
  public function run()
  {
    factory(ArticleContent::class, 100)->create();
  }
}
