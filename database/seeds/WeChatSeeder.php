<?php

use Illuminate\Database\Seeder;

class WeChatSeeder extends Seeder
{
    public function run()
    {
        \App\Models\WeChat::create([
            'site_id' => 1,
            'config' => config('hd.weChat')
        ]);
    }
}
