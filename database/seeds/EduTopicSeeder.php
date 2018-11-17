<?php

use Illuminate\Database\Seeder;

class EduTopicSeeder extends Seeder
{
    public function run()
    {
        \App\Models\EduTopic::withoutSyncingToSearch(function () {
            factory(\App\Models\EduTopic::class, 30)->create();
        });
    }
}
