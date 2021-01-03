<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
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
        $this->updateSitePermission($site);
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
        return redirect()->route('site.role.index', $site)->with('success', '权限设置成功');
    }

    /**
     * 更新权限信息
     *
     * @param Request $request
     * @param Site $site
     * @return void
     */
    public function upgrade(Request $request, Site $site)
    {
        $this->updateSitePermission($site);
        return back()->with('success', '站点权限表更新成功');
    }

    /**
     * 更新站点权限
     *
     * @param Site $site
     * @return void
     */
    protected function updateSitePermission(Site $site)
    {
        //删除无效的权限，即模块permissions.php已经移除的权限
        app(PermissionService::class)->delInvalidSitePermission($site);
        //同步模块权限到站点
        app(PermissionService::class)->saveSiteModulePermissions($site);
    }
}
