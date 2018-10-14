<?php

use Illuminate\Database\Seeder;

class ArticleSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\Article::class,30)->create();
    }
}
