<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Site::create([
            'name' => '后盾人',
            'description' => '这是用来演示的测试站点，随时可以删除',
        ]);
    }
}
