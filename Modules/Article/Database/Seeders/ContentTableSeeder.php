<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Article\Entities\Content;

class ContentTableSeeder extends Seeder
{
    public function run()
    {
        Content::factory()->count(100)->create([
            'model_id' => 1
        ]);
    }
}
