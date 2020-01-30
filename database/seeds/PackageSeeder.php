<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $package = new \App\Models\Package();
        $package->name = '系统套餐';
        $package->system = true;
        $package->save();
    }
}
