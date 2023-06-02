<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Package;
use App\Models\Topic;
use App\Models\User;
use Auth;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        Auth::login(User::find(1));
        User::find(1)->update(['name' => 'admin', 'nickname' => '向军大叔', "mobile" => 19999999999]);
        User::find(2)->update(['name' => 'houdunren', 'nickname' => '后盾人', "mobile" => 18888888888]);
        Topic::factory(300)->create();
        Package::factory(2)->create();
        $this->call([
            // ConfigSeeder::class
        ]);
    }
}
