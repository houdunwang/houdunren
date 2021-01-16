<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Module;
use Inertia\Inertia;
use SiteService;
use ModuleService;

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
    public function index(Site $site)
    {
        $modules = ModuleService::getSiteModulesByPermission($site);
        return inertia('Site/Module/Index', compact('site', 'modules'));
    }

    /**
     * 进入模块
     *
     * @param Site $site
     * @param string $module
     * @return void
     */
    public function admin(Site $site, string $module)
    {
        $d = SiteService::show();
        // dd($d);
        // site($site);
        // module($module);
        // return Inertia::location(url($module . '/admin'));
    }
}
