<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Article\Entities\Category;

class CategoryTableSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();
        Category::factory()->count(6)->hasContents(20)->create();
    }
}
