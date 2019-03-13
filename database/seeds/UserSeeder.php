<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class, 1)->make()->each(function ($user) {
            $user['group_id'] = 1;
            $user['admin_end'] = (new \Carbon\Carbon())->addYear(1);
            $user['lock'] = false;
            $user->save();
        });
        $user = \App\User::find(1);
        $user->name = '向军大叔';
        $user->email = '2300071698@qq.com';
        $user->mobile = null;
        $user->icon = asset('images/system/user.jpg');
        $user->site_id = null;
        $user->save();
        \App\Models\Site::find(1)->user()->save(\App\User::find(1), ['role' => 'admin']);

//        $user->save();
//        $user = \App\User::find(2);
//        $user->name = '后盾人';
//        $user->email = '931241005@qq.com';
//        $user->mobile = null;
//        $user->icon = asset('images/system/user.jpg');
//        $user->site_id = 1;
//        $user->save();
    }
}
