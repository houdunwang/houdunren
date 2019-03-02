<?php

use Illuminate\Database\Seeder;

class GroupPackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $group = \App\Models\Group::first();
        $package = \App\Models\Package::first();
        $group->package()->save($package);
    }
}
