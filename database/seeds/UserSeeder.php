<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        factory(User::class, 10)->create();
        $user = User::first();
        $user['name'] = '后盾人';
        $user['mobile'] = 19999999999;
        $user->save();
    }
}
