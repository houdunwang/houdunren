<?php

use Illuminate\Database\Seeder;

class CloudSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Cloud::create([
            'api_host' => null,
            'build' => time(),
            'token' => null,
        ]);
    }
}
