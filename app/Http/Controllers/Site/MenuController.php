<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  public function show(Site $site, $type, $menu, MenuService $menuService)
  {
    $menuService->currentActiveMenu($type, explode('-', $menu));

    return redirect($menuService->currentActiveMenuRoute(module()));
  }
}
