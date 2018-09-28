<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    public function run()
    {
        Role::create(['name' => 'webmaster', 'title' => '站长','system'=>1]);
        Role::create(['name' => 'admin', 'title' => '管理员','system'=>1]);
    }
}
