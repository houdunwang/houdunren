<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Models\Module;
use App\Services\ModuleService;
use App\Services\PermissionService;

class ModuleController extends Controller
{
    public function index(Site $site)
    {
        return view('site_module.index', compact('site'));
    }

    public function show(Site $site, Module $module, PermissionService $permissionService)
    {
        $this->cache($site, $module);

        $status = $permissionService->checkModulePermission(module());
        if ($status === false) {
            return back()->with('danger', '你没有管理模块的权限');
        }

        return redirect(url($module['name'] . '/admin'));
    }

    protected function cache($site, $module)
    {
        site($site);
        $module = app(ModuleService::class)->findBySite($site, $module['name']);
        unset($module['model']);
        module($module);
    }
}
