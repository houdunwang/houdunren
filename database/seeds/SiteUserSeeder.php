<?php

use Illuminate\Database\Seeder;
use App\Models\SiteUser;

class SiteUserSeeder extends Seeder
{
    public function run()
    {
        factory(SiteUser::class, 3)->create();
    }
}
