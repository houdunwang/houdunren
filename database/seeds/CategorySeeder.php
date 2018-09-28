<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    public function run()
    {
        $data = [
            ['title' => '文章', 'description' => '描述信息', 'icon' => 'fa fa-edit'],
            ['title' => '技术分享', 'description' => '描述信息', 'icon' => 'fa fa-share-square-o'],
            ['title' => '问答求助', 'description' => '描述信息', 'icon' => 'fa fa-soccer-ball-o'],
            ['title' => '码农生活', 'description' => '描述信息', 'icon' => 'fa fa-send-o'],
            ['title' => '桌面文化', 'description' => '描述信息', 'icon' => 'fa fa-laptop'],
        ];
        foreach ($data as $category) {
            \App\Models\Category::firstOrCreate(['title' => $category['title']], $category);
        }
    }
}
