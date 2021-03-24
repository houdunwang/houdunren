<?php

namespace Modules\Edu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Subscribe;

class SubscribeSeederTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $data = [
      ['site_id' => 1, 'title' => '半年付', 'ad' => '小试牛刀', 'icon' => 'fa fa-desktop', 'month' => '6', 'price' => '499'],
      ['site_id' => 1, 'title' => '一年付', 'ad' => '利用一年时间提升段位', 'icon' => 'fa fa-diamond', 'month' => '12', 'price' => '745'],
      ['site_id' => 1, 'title' => '两年付', 'ad' => '成为技术大牛', 'icon' => 'fa fa-empire', 'month' => '24', 'price' => '1210'],
    ];
    collect($data)->map(function ($s) {
      Subscribe::updateOrCreate($s, $s);
    });
  }
}
