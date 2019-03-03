<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Package::create([
            'name' => '体验套餐',
            'system' => true,
        ]);
    }
}
