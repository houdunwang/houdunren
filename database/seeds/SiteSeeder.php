<?php

use Illuminate\Database\Seeder;
use App\Models\Site;

class SiteSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    factory(Site::class, 10)->create();
  }
}
