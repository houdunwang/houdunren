<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use App\Models\Site;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

/**
 * 角色管理
 * @package App\Http\Controllers\Site
 */
class RoleController extends Controller
{
    /**
     * 角色列表
     *
     * @param Site $site
     * @return void
     */
    public function index(Site $site)
    {
        $this->authorize('update', $site);
        $roles = $site->roles;
        return inertia('Site/Role/Index', compact('roles', 'site'));
    }

    /**
     * 添加角色
     *
     * @param Site $site
     * @return void
     */
    public function create(Site $site)
    {
        $this->authorize('update', $site);
        return inertia('Site/Role/Form', compact('site'));
    }

    /**
     * 保存角色
     *
     * @param RoleRequest $request
     * @param Site $site
     * @return void
     */
    public function store(RoleRequest $request, Site $site)
    {
        $this->authorize('update', $site);
        Role::create($request->only(['title', 'name']) + ['site_id' => $site->id]);

        return redirect()->route('site.role.index', $site)->with('success', '角色添加成功');
    }

    /**
     * 编辑角色
     *
     * @param Site $site
     * @param Role $role
     * @return void
     */
    public function edit(Site $site, Role $role)
    {
        $this->authorize('update', $site);
        return inertia('Site/Role/Form', compact('role', 'site'));
    }

    public function update(RoleRequest $request, Site $site, Role $role)
    {
        $this->authorize('update', $site);
        $role->fill($request->input())->save();
        return redirect()
            ->route('site.role.index', $site)
            ->with('success', '角色保存成功');
    }

    /**
     * 删除角色
     *
     * @param Site $site
     * @param Role $role
     * @return void
     */
    public function destroy(Site $site, Role $role)
    {
        $this->authorize('update', $site);
        $role->delete();
        return back()->with('succes', '角色删除成功');
    }
}
