<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Module;
use App\Services\ModuleService;
use App\Services\PermissionService;
use Illuminate\Routing\Redirector;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use LogicException;

/**
 * 站点模块
 * @package App\Http\Controllers\Site
 */
class ModuleController extends Controller
{
  /**
   * 站点模块列表
   * @param Site $site
   * @param ModuleService $moduleService
   * @param PermissionService $permissionService
   * @return View|Factory
   * @throws BindingResolutionException
   */
  public function index(Site $site, ModuleService $moduleService, PermissionService $permissionService)
  {
    $modules = $moduleService->getSiteModulesByPermission($site);

    return view('site.module.index', compact('site', 'modules'));
  }

  /**
   * 进入模块
   * @param Site $site
   * @param Module $module
   * @param PermissionService $permissionService
   * @return Redirector|RedirectResponse
   * @throws BindingResolutionException
   * @throws LogicException
   */
  public function admin(Site $site, Module $module, PermissionService $permissionService)
  {
    site($site);
    module($module['name']);
    return redirect(url($module['name'] . '/admin'));
  }
}
