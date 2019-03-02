<?php

use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Site::create([
            'name' => '后盾人',
            'description' => '这是用来演示的测试站点，随时可以删除',
        ]);
    }
}
