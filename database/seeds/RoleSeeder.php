<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'title' => '管理员',
            'site_id' => 1,
            'name' => 'admin'
        ]);
        Role::create([
            'title' => '编辑',
            'site_id' => 1,
            'name' => 'editor'
        ]);
    }
}
