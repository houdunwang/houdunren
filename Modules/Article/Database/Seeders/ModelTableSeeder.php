<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Article\Entities\Model;

class ModelTableSeeder extends Seeder
{
    public function run()
    {
        // Model::unguard();
        Model::factory()->count(2)->create();
    }
}
