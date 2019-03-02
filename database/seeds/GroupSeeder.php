<?php

use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\Group::create([
            'name' => '体验组',
            'site_num' => 3,
            'system' => true,
        ]);
    }
}
