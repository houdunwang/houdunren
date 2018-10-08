<?php

use Illuminate\Database\Seeder;

class ContentModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = ['title' => '普通文章', 'fields' => [], 'is_system' => 1];
        \App\Models\ContentModel::create($model);
    }
}
