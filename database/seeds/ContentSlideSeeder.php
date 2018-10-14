<?php

use Illuminate\Database\Seeder;

class ContentSlideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(\App\Models\ContentSlide::class, 2)->create();
    }
}
