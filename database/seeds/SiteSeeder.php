<?php

use Illuminate\Database\Seeder;
use App\Models\Site;
use App\User;

class SiteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $site = new Site;
        $site->name = '后盾人';
        $site->description = '后盾人专注互联网开发';
        $site->domain = 'http://localhost';
        $site->save();
        $site->user()->attach(User::first(), ['role' => 'admin']);
    }
}
