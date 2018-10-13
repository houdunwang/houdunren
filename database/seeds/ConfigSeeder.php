<?php

use Illuminate\Database\Seeder;

class ConfigSeeder extends Seeder
{
    public function run()
    {
        $configs = [
            [
                'name' => 'base',
                'data' => [
                    'code_expire' => '60',
                ],
            ],
            [
                'name' => 'site',
                'data' => [
                    'webname' => '后盾人',
                    'keywords' => 'PHP,Linux,HTML5',
                    'description' => '后盾人专注PHP与WEB开发实战',
                    'copyright' => 'Copyright © 2010-2017 houdunren.com All Rights Reserved 京ICP备12048441号-322',
                    'tel' => '010-86467608',
                    'email' => '23000711698@qq.com',
                ],
            ],
            [
                'name' => 'upload',
                'data' => [
                    'image_size' => '2000000',
                    'image_width' => '1000',
                    'image_height' => '1000',
                    'image_type' => 'jpg,jpeg,gif,png',
                    'file_size' => '2000',
                    'file_type' => 'zip,rar,doc,txt,pem,json',
                ],
            ],
        ];
        foreach ($configs as $config) {
            \App\Models\Config::create($config);
        }
    }
}
