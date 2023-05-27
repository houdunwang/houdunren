<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Topic;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        User::find(1)->update(['email' => '2300071698@qq.com', 'name' => '向军大叔']);
        User::find(2)->update(['email' => 'admin@houdunren.com', 'name' => '后盾人']);
        Topic::factory(300)->create();
    }
}
