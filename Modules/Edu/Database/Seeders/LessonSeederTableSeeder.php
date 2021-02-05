<?php

namespace Modules\Edu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Lesson;

class LessonSeederTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    factory(Lesson::class, 50)->create();
    // $this->call("OthersTableSeeder");
  }
}
