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
        \App\Models\Package::create([
            'name' => '体验套餐',
            'system' => true,
        ]);
    }
}
