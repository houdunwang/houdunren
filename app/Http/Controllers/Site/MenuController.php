<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use App\Models\Site;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  public function index(Site $site)
  {
    return view('menu.index', compact('site'));
  }

  public function get(Site $site)
  {
    return $site->menus;
  }

  public function store(Request $request, Site $site, Menu $menu)
  {
    Menu::where('site_id', $site['id'])->delete();
    foreach ($request->menus as $menu) {
      if ($menu['title'] && $menu['url']) {
        Menu::create($menu + ['site_id' => $site['id']]);
      }
    }
    return ['message' => '菜单修改成功'];
  }
}
