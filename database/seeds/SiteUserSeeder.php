<?php

use Illuminate\Database\Seeder;
use App\Models\SiteUser;

class SiteUserSeeder extends Seeder
{
    public function run()
    {
        SiteUser::insert([
            ['site_id' => 1, 'role' => 'admin', 'user_id' => 1],
            ['site_id' => 1, 'role' => 'user', 'user_id' => 2],
            ['site_id' => 1, 'role' => 'operator', 'user_id' => 3],
            ['site_id' => 2, 'role' => 'admin', 'user_id' => 2],
            ['site_id' => 2, 'role' => 'user', 'user_id' => 1],
            ['site_id' => 3, 'role' => 'admin', 'user_id' => 3],
            ['site_id' => 3, 'role' => 'user', 'user_id' => 2],
        ]);
    }
}
