<?php

use Illuminate\Database\Seeder;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'PHP'],
            ['name' => 'Laravel'],
            ['name' => 'HDCMS'],
        ];
        foreach ($data as $d) {
            \App\Models\Tag::firstOrCreate(['name' => $d['name']], $d);
        }
    }
}
