<?php

namespace App\Http\Controllers\Module;

use App\Http\Controllers\Controller;
use App\Services\MenuService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;

/**
 * 后台菜单
 * @package App\Http\Controllers\Site
 */
class MenuController extends Controller
{
  /**
   * 后台模块菜单
   * @param string $path
   * @param MenuService $menuService
   * @return Redirector|RedirectResponse
   * @throws BindingResolutionException
   */
  public function show(string $path, MenuService $menuService)
  {
    $menuService->currentActiveMenu(explode('-', $path));

    return redirect($menuService->currentActiveMenuRoute());
  }
}
