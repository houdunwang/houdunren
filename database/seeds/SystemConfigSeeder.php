<?php

use Illuminate\Database\Seeder;

class SystemConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = \App\Models\SystemConfig::create([
            'config'=>config('hd.system')
        ]);
    }
}
