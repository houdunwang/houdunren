<?php

namespace App\Http\Controllers;

use App\Models\Site;
use App\Repositories\PermissionRepository;
use App\Repositories\SitePermissionRepository;
use App\User;
use Illuminate\Http\Request;

class SitePermissionController extends Controller
{
    public function edit(Site $site, User $user, SitePermissionRepository $repository)
    {
        $permissions = $repository->permissions($site);
        return view('site_permission.edit', compact('site', 'user', 'permissions'));
    }

    public function store(Site $site, User $user, SitePermissionRepository $repository, Request $request)
    {
        $user->syncPermissions($request->input('permissions'));
        return back()->with('success','操作员权限设置成功');
    }

    public function site(SitePermissionRepository $repository, Site $site)
    {
        $repository->loadModulePermissions($site);
        return back()->with('success', '权限列表缓存更新成功');
    }
}
