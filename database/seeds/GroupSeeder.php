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
        $data = ['name' => '普通会员组', 'site_num' => 3, 'system' => true, 'default' => 1];
        \App\Models\Group::create($data);
    }
}
