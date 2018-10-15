<?php

use Illuminate\Database\Seeder;

class EduTopicSeeder extends Seeder
{
    public function run()
    {
        factory(\App\Models\EduTopic::class,30)->create();
    }
}
