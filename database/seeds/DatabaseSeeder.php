<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(GroupSeeder::class);
        // $this->call(UserSeeder::class);
        $this->call(SiteSeeder::class);
        $this->call(PackageSeeder::class);
        $this->call(SystemConfigSeeder::class);
        $this->call(WeChatSeeder::class);
        // $this->call(SiteUserSeeder::class);
    }
}
