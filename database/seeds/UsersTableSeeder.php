<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users          = factory(\App\User::class, 6)->create();
        $user           = $users[0];
        $user->name     = 'admin';
        $user->email    = '2300071698@qq.com';
        $user->nickname = '向军大叔';
        $user->save();
    }
}
