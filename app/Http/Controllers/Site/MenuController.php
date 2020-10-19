<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Services\MenuService;
use Illuminate\Http\Request;

class MenuController extends Controller
{
  public function show(Site $site, $menu, MenuService $menuService)
  {
    $menuService->currentActiveMenu(explode('-', $menu));

    return redirect($menuService->currentActiveMenuRoute(module()));
  }

  public function type(Site $site, string $type, MenuService $menuService)
  {
    $menuService->type($type);

    return back();
  }
}
