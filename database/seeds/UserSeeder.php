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
    }
}