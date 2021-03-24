<?php

namespace Database\Seeders;

use App\Models\Site;
use Illuminate\Database\Seeder;

class SiteSeeder extends Seeder
{

    public function run()
    {
        Site::create([
            'title' => '后盾人',
            'domain' => 'http://hdcms.test',
            'config' => [],
            'user_id' => 1
        ]);
    }
}
