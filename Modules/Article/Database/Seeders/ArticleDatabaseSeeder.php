<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticleDatabaseSeeder extends Seeder
{
  public function run()
  {
    $this->call(ModelSeederTableSeeder::class);
    $this->call(CategorySeederTableSeeder::class);
    $this->call(ContentSeederTableSeeder::class);
  }
}
