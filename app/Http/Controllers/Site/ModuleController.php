<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use Inertia\Inertia;
use ModuleService;
use App\Models\Module;
use Auth;

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
     * @return void
     */
    public function index(Site $site)
    {
        $modules = ModuleService::userSiteModules($site, Auth::user());
        return inertia('Site/Module/Index', compact('site', 'modules'));
    }

    /**
     * 进入模块后台
     *
     * @param Site $site
     * @param Module $module
     * @return void
     */
    public function admin(Site $site, Module $module)
    {
        session(['site_id' => $site['id']]);
        session(['module_id' => $module['id']]);
        return redirect()->route('module.entry');
    }
}
