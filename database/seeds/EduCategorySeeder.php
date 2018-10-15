<?php

use Illuminate\Database\Seeder;

class EduCategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['title' => '文章', 'description' => '', 'system' => 1, 'icon' => 'fa fa-edit'],
            ['title' => '技术分享', 'description' => '', 'system' => 0, 'icon' => 'fa fa-share-square-o'],
            ['title' => '问答求助', 'description' => '', 'system' => 0, 'icon' => 'fa fa-soccer-ball-o'],
            ['title' => '码农生活', 'description' => '', 'system' => 0, 'icon' => 'fa fa-send-o'],
            ['title' => '桌面文化', 'description' => '', 'system' => 0, 'icon' => 'fa fa-laptop'],
        ];
        foreach ($data as $category) {
            \App\Models\EduCategory::firstOrCreate(['title' => $category['title']], $category);
        }
    }
}
