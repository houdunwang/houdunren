<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(\App\User::class,10)->create();
        $user = \App\User::find(1);
        $user->name='向军大叔';
        $user->email = '2300071698@qq.com';
        $user->mobile=18600276067;
        $user->save();
    }
}
