<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class, 5)->make()->each(function ($user) {
            $user['group_id'] = 1;
            $user['admin_end'] = (new \Carbon\Carbon())->addYear(1);
            $user['lock'] = false;
            $user->save();
        });
        $user = \App\User::find(1);
        $user->name = '向军大叔';
        $user->email = '2300071698@qq.com';
        $user->mobile = null;
        $user->site_id = null;

        \App\Models\Site::find(1)->user()->save(\App\User::find(1), ['role' => 'admin']);

        $user->save();
        $user = \App\User::find(2);
        $user->name = '后盾人';
        $user->email = '931241005@qq.com';
        $user->mobile = null;
        $user->site_id = 1;
        $user->save();
    }
}
