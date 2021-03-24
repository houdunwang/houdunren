<?php

namespace Database\Seeders;

use App\Models\SystemConfig;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        SystemConfig::create([
            'config' => ['title' => '后盾人', 'logo' => '/images/logo.png', 'copyright' => '开源免费内容管理系统'],
        ]);
    }
}
