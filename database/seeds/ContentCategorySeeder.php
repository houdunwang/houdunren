<?php

use Illuminate\Database\Seeder;

class ContentCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            ['title' => '新闻', 'model_id' => 1, 'parent_id' => 0],
            ['title' => '汽车', 'model_id' => 1, 'parent_id' => 1],
        ];
        foreach ($categories as $category) {
            \App\Models\ContentCategory::create($category);
        }
    }
}
