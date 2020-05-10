<?php

use Illuminate\Database\Seeder;
use App\Models\Site;

class SiteSeeder extends Seeder
{
    public function run()
    {
        factory(Site::class, 1)->create();
    }
}
