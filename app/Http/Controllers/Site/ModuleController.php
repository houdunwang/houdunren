<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Module;
use App\Services\ModuleService;
use App\Services\PermissionService;

class ModuleController extends Controller
{
  public function index(Site $site, ModuleService $moduleService, PermissionService $permissionService)
  {
    $modules = $moduleService->getSiteModules($site)->filter(function ($module) use ($site, $permissionService) {
      return $permissionService->checkModulePermission($site, $module);
    });

    return view('site_module.index', compact('site', 'modules'));
  }

  public function show(Site $site, Module $module, PermissionService $permissionService)
  {
    site($site);

    module($module['name']);

    return redirect(url($module['name'] . '/admin'));
  }
}
