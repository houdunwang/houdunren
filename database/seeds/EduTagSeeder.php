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
            ['name' => 'Composer'],
            ['name' => 'PHP'],
            ['name' => 'Linux'],
            ['name' => 'ThinkPHP'],
            ['name' => 'Laravel'],
            ['name' => '码农生活'],
            ['name' => 'CSS'],
            ['name' => 'Vue.js'],
            ['name' => 'Webpack'],
            ['name' => 'Gulp'],
        ];
        foreach ($data as $d) {
            \App\Models\EduTag::create(['name' => $d['name']], $d);
        }
    }
}
