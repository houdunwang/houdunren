<?php

namespace Modules\Edu\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Edu\Entities\Tag;

class TagSeederTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Model::unguard();
    $tags = [
      ['title' => 'CSS'], ['title' => 'JAVSCRIPT'], ['title' => 'PHP'],
      ['title' => 'LARAVEL'], ['title' => 'VUE.JS'],
      ['title' => '小程序'], ['title' => '微信公众号'], ['title' => 'APP'],
      ['title' => 'VUEX'], ['title' => 'VUE-ROUTER'], ['title' => 'BOOTSTRAP'],
      ['title' => 'ELEMENT-UI'], ['title' => 'AXIOS'], ['title' => 'VUE-CLI']
    ];
    collect($tags)->map(function ($tag) {
      $tag['site_id'] = 1;
      Tag::updateOrCreate($tag, $tag);
    });
    // $this->call("OthersTableSeeder");
  }
}
