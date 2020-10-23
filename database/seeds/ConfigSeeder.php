<?php

use App\Models\Config;
use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
  public function run()
  {
    Config::create([
      'config' => ['title' => '后盾人 人人做后盾', 'logo' => '/images/logo.png', 'copyright' => '后盾人 人人做后盾 <br/> Powered by hdcms v6 © 2014-2020 www.hdcms.com'],
    ]);
  }
}
