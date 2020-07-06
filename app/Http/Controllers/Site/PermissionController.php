<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Site;
use App\Services\ModuleService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('site');
    }

    public function edit(Site $site, Role $role, ModuleService $moduleService)
    {
        $moduleService->syncSitePermissions($site);

        $modules = $site->user->group->modules->map(function ($module) use ($moduleService, $site) {
            return $moduleService->setSitePrefixToPermission($site, $moduleService->find($module['name']));
        });

        // dd($modules);
        return view('permission.edit', compact('site', 'role', 'modules'));
    }

    public function update(Request $request, Site $site, Role $role)
    {
        $role->syncPermissions($request->input('permissions'));

        return back()->with('success', '权限设置成功');
    }
}
