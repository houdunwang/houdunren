<?php

namespace Modules\Article\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ArticleDatabaseSeeder extends Seeder
{
    public function run()
    {
        Model::unguard();

        $this->call(
            [
                ModelTableSeeder::class,
                TagTableSeeder::class,
                CategoryTableSeeder::class,
                // ContentTableSeeder::class,
            ]
        );
    }
}
