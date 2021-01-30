<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            PackageSeeder::class,
            GroupSeeder::class,
            UserSeeder::class,
            SiteSeeder::class,
            RoleSeeder::class,
            SystemConfigSeeder::class
        ]);
    }
}
