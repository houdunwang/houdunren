<?php

use App\User;
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
        factory(User::class, 20)->create();
        $user = User::find(1);
        $user->name = '向军大叔';
        $user->email = '2300071698@qq.com';
        $user->mobile = 18600000000;
        $user->save();
        $user = User::find(2);
        $user->name = 'xj';
        $user->email = '931241005@qq.com';
        $user->mobile = 19999999999;
        $user->save();
        $user->save();
        $user = User::find(3);
        $user->name = 'xy';
        $user->email = '35288551@qq.com';
        $user->mobile = 188888888888;
        $user->save();
    }
}