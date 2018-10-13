<?php

use Illuminate\Database\Seeder;

class ContentArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ContentArticle::class,10)->create();
    }
}
