<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Services\MenuService;
use App\Services\ModuleService;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{

    public function edit(Site $site, Role $role, ModuleService $moduleService, PermissionService $permissionService, MenuService $menuService)
    {
        $permissionService->saveSiteModulePermissions($site);
        $permissionService->saveSiteSystemPermissions($site);

        $modules = $moduleService->getSiteModules($site);

        $systemMenus = $menuService->getSiteSystemMenus($site);
        return view('permission.edit', compact('site', 'role', 'modules', 'systemMenus'));
    }

    public function update(Request $request, Site $site, Role $role)
    {
        $role->syncPermissions($request->input('permissions'));

        return back()->with('success', '权限设置成功');
    }
}
