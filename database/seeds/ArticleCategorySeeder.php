<?php

use Illuminate\Database\Seeder;

class ArticleCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorys = factory(\App\ArticleCategory::class, 10)->create();
        $categorys[2]['pid'] = 1;
        $categorys[2]->save();
        $categorys[3]['pid'] = 2;
        $categorys[3]->save();
    }
}
