<?php

namespace Modules\Edu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class EduDatabaseSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    $this->call(LessonSeederTableSeeder::class);
    $this->call(SystemSeederTableSeeder::class);
    // $this->call("OthersTableSeeder");
  }
}
