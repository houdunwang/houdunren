<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Resources\RoleResource;
use App\Models\Site;
use App\Services\MenuService;
use App\Services\ModuleService;
use App\Services\PermissionService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

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
     * @param PermissionService $permissionService
     * @return void
     */
    public function edit(Site $site, Role $role, ModuleService $moduleService, PermissionService $permissionService)
    {
        $modules = $moduleService->getSiteModules($site);
        $permissions = $role->permissions->map(fn ($p) => $p['name']);
        return inertia('Site/Permission/Form', compact('site', 'modules', 'role', 'permissions'));
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
        //根据权限名称获取权限表(permissions)的id用于同步角色权限使用
        $permissions = Permission::whereIn('name', $request->input('permissions'))->pluck('id');
        $role->syncPermissions($permissions);
        return redirect()->route('site.permission.edit', [$site, $role])->with('success', '权限设置成功');
    }

    /**
     * 更新权限信息
     *
     * @param Request $request
     * @param Site $site
     * @return void
     */
    public function upgrade(Request $request, Site $site, PermissionService $permissionService)
    {
        $permissionService->delInvalidSitePermission($site);
        $permissionService->saveSiteModulePermissions($site);
        return back()->with('success', '站点权限表更新成功');
    }
}
