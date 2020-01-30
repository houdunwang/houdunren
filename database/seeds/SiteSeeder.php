<?php

use Illuminate\Database\Seeder;
use App\Models\Site;

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
        $site->save();
    }
}
