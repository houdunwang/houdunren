<?php

namespace Modules\Edu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\System;

class SystemSeederTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(System::class, 10)->create();
  }
}
