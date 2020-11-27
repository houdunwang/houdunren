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
        $user['email'] = 'admin@hdcms.test';
        $user['mobile'] = 19999999999;
        $user->save();

        $user = User::find(2);
        $user['name'] = 'HDCMS';
        $user['mobile'] = 18888888888;
        $user['email'] = 'user@hdcms.test';
        $user->save();
    }
}
