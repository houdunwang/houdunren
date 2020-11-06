<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Services\MenuService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;

/**
 * 后台菜单
 * @package App\Http\Controllers\Site
 */
class MenuController extends Controller
{
  public function show(Site $site, string $tag, string $path, MenuService $menuService)
  {
    $menuService->currentActiveMenu($tag, explode('-', $path));

    return redirect($menuService->currentActiveMenuRoute($tag));
  }

  /**
   * 切换菜单模块
   * @param Site $site
   * @param string $module
   * @param MenuService $menuService
   * @return RedirectResponse
   * @throws BindingResolutionException
   */
  // public function module(Site $site, string $module, MenuService $menuService)
  // {
  //   $menuService->module($module);

  //   return back();
  // }
}
