<?php

use Illuminate\Database\Seeder;

class EduTagSeeder extends Seeder
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
            \App\Models\EduTag::create(['name' => $d['name']], $d);
        }
    }
}
