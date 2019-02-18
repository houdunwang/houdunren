<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Repositories\SitePermissionRepository;
use App\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

/**
 * 设置会员站点权限
 * Class SitePermissionController
 * @package App\Http\Controllers
 */
class SitePermissionController extends Controller
{
    /**
     * 设置权限
     * @param Site $site
     * @param User $user
     * @param SitePermissionRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Site $site, User $user, SitePermissionRepository $repository)
    {
        $permissions = $repository->permissions($site);
        return view('site_permission.edit', compact('site', 'user', 'permissions'));
    }

    /**
     * 保存处理
     * @param Site $site
     * @param User $user
     * @param SitePermissionRepository $repository
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Site $site, User $user, SitePermissionRepository $repository, Request $request)
    {
        $ids = Permission::whereIn('name',$request->input('permissions'))->pluck('id')->toArray();
        $user->permissions()->syncWithoutDetaching($ids);
        return back()->with('success', '操作员权限设置成功');
    }

    /**
     * 更新站点模块权限列表
     * @param SitePermissionRepository $repository
     * @param Site $site
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Throwable
     */
    public function site(SitePermissionRepository $repository, Site $site)
    {
        $repository->loadModulePermissions($site);
        return back()->with('success', '权限列表缓存更新成功');
    }
}
