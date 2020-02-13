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
        $data = ['name' => '体验组', 'site_num' => 3, 'system' => true, 'package_id' => []];
        \App\Models\Group::create($data);
    }
}
