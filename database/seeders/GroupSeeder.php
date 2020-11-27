<?php

namespace Database\Seeders;

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupSeeder extends Seeder
{
    public function run()
    {
        $groups = Group::factory()->count(3)->create();
        $group = $groups->first();
        $group['title'] = '普通会员组';
        $group->save();
    }
}
