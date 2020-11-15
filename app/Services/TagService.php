<?php

namespace App\Services;

use App\Models\Menu;
use Blade;
use InvalidArgumentException;

class TagService
{
  protected $tags = ['menu'];

  public function make()
  {
    foreach ($this->tags as $tag) {
      $this->$tag();
    }
  }

  /**
   * 站点菜单
   * @return void
   * @throws InvalidArgumentException
   */
  protected function menu()
  {
    Blade::directive('menu', function ($expression) {
      return "<?php
        \$menus = \App\Models\Menu::where('site_id',site()['id'])->get();
        foreach (\$menus as \$menu) :
       ?>";
    });

    Blade::directive('endmenu', function ($expression) {
      return "<?php endforeach; ?>";
    });
  }
}
