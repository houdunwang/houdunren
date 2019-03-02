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
        $update =include base_path().'/update_files.php';
        \App\Models\Cloud::create([
            'api_host' => null,
            'build' => $update['build'],
            'token' => null,
        ]);
    }
}
