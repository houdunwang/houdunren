<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Services\MenuService;
use App\Services\ModuleService;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * 权限设置
 * @package App\Http\Controllers\Site
 */
class PermissionController extends Controller
{
    /**
     * 权限设置
     *
     * @param Site $site 站点
     * @param Role $role 角色
     * @param ModuleService $moduleService
     * @param MenuService $menuService
     * @param PermissionService $permissionService
     * @return void
     */
    public function edit(Site $site, Role $role, ModuleService $moduleService, MenuService $menuService, PermissionService $permissionService)
    {
        $permissionService->saveSiteModulePermissions($site);
        $modules = $moduleService->getSiteModules($site);
        return inertia('Site/Permission/Form', compact('site', 'role', 'modules'));
    }

    /**
     * 保存权限
     *
     * @param Request $request
     * @param Site $site
     * @param Role $role
     * @return void
     */
    public function update(Request $request, Site $site, Role $role)
    {
        $role->syncPermissions(array_map(function ($permission) use ($site) {
            //0 模块 1 权限标识
            $info = explode('|', $permission);
            return permission_name($info[1], $site, app(ModuleService::class)->find($info[0]));
        }, $request->input('permissions', [])));

        return back()->with('success', '权限设置成功');
    }
}
