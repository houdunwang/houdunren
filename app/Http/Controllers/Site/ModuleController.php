<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Module;
use App\Services\ModuleService;
use App\Services\PermissionService;
use Inertia\Inertia;

/**
 * 站点模块展示
 * @package App\Http\Controllers\Site
 */
class ModuleController extends Controller
{
    /**
     * 站点模块列表
     *
     * @param Site $site
     * @param ModuleService $moduleService
     * @param PermissionService $permissionService
     * @return void
     */
    public function index(Site $site, ModuleService $moduleService, PermissionService $permissionService)
    {
        $modules = $moduleService->getSiteModulesByPermission($site);
        return inertia('Site/Module/Index', compact('site', 'modules'));
    }

    /**
     * 进入模块
     *
     * @param Site $site
     * @param Module $module
     * @param PermissionService $permissionService
     * @return void
     */
    public function admin(Site $site, Module $module, PermissionService $permissionService)
    {
        site($site);
        module($module['name']);
        return Inertia::location(url($module['name'] . '/admin'));
    }
}
