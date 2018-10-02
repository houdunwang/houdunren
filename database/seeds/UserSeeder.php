<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\User::class, 10)->create();
        $user = \App\User::find(1);
        $user['name'] = '向军大叔';
        $user['email'] = '2300071698@qq.com';
        $user['password'] = bcrypt('admin888');
        $user->save();


        $user = \App\User::find(2);
        $user['name'] = '李四';
        $user['email'] = '931241005@qq.com';
        $user['password'] = bcrypt('admin888');
        $user->save();
    }
}
