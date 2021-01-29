<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run()
    {
        User::factory()->count(10)->create();

        $user = User::find(1);
        $user['name'] = '后盾人';
        $user['email'] = 'admin@houdunren.com';
        $user['mobile'] = 11111111111;
        $user->save();

        $user = User::find(2);
        $user['name'] = '小海豚';
        $user['mobile'] = 22222222222;
        $user['email'] = 'user@houdunren.com';
        $user->save();

        $user = User::find(3);
        $user['name'] = 'HDCMS';
        $user['mobile'] = 33333333333;
        $user['email'] = 'hdcms@houdunren.com';
        $user->save();
    }
}
