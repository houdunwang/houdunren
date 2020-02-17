<?php

use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
  public function run()
  {
    $package = new \App\Models\Package();
    $package->name = '体验套餐';
    $package->save();
  }
}
