<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Repositories\PermissionRepository;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

/**
 * 设置会员站点权限
 * Class PermissionController
 * @package App\Http\Controllers
 */
class PermissionController extends Controller
{
    /**
     * 设置权限
     * @param Site $site
     * @param User $user
     * @param PermissionRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Site $site, User $user, PermissionRepository $repository)
    {
        $permissions = $repository->permissions($site);
        return view('permission.edit', compact('site', 'user', 'permissions'));
    }

    /**
     * 保存处理
     * @param Site $site
     * @param User $user
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Site $site, User $user, Request $request)
    {
        $user->permissions()->detach(Permission::where('site_id', $site['id'])->pluck('id'));
        $user->permissions()->attach($request->input('permissions', []));

        return back()->with('success', '操作员权限设置成功');
    }

    /**
     * 更新站点模块权限列表
     * @param PermissionRepository $repository
     * @param Site $site
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function site(PermissionRepository $repository, Site $site)
    {
        $repository->loadModulePermissions($site);
        return back()->with('success', '权限列表缓存更新成功');
    }
}
