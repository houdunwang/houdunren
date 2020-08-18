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
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    public function edit(Site $site, Role $role, ModuleService $moduleService,  MenuService $menuService, PermissionService $permissionService)
    {
        $permissionService->saveSiteModulePermissions($site);

        $modules = $moduleService->getSiteModules($site);

        return view('permission.edit', compact('site', 'role', 'modules'));
    }

    public function update(Request $request, Site $site, Role $role)
    {
        $role->syncPermissions(array_map(function ($permission) use ($site) {
            //0 模块 1 权限标识
            $info = explode('|', $permission);
            return permission_name($info[1], $site, app(ModuleService::class)->find($info[0]));
        }, $request->input('permissions')));

        return back()->with('success', '权限设置成功');
    }
}
