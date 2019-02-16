<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class, 30)->make()->each(function ($user) {
            $user['group_id'] = 1;
            $user['admin_end'] = (new \Carbon\Carbon())->addYear(1);
            $user['lock'] = false;
            $user->save();
        });
        $user = \App\User::find(1);
        $user->name = '向军大叔';
        $user->email = '2300071698@qq.com';
        $user->mobile = 18600276067;
        $user->save();
        $user = \App\User::find(2);
        $user->name = '李四';
        $user->email = '931241005@qq.com';
        $user->mobile = 18600276068;
        $user->save();
    }
}
