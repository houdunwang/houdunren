<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Illuminate\Validation\Rule;
use Modules\Admin\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

/**
 * 角色管理
 * Class RoleController
 *
 * @package Modules\Admin\Http\Controllers
 */
class RoleController extends Controller
{
    /**
     * 角色列表
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $roles = Role::get();

        return view('admin::role.index', compact('roles'));
    }

    /**
     * 添加角色
     *
     * @param \Modules\Admin\Http\Requests\RoleRequest $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(RoleRequest $request)
    {
        Role::create(['name' => $request->name, 'title' => $request->title]);
        session()->flash('success', '角色添加成功');

        return back();
    }

    /**
     * 更新
     *
     * @param \Modules\Admin\Http\Requests\RoleRequest $request
     * @param \Spatie\Permission\Models\Role           $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(RoleRequest $request, Role $role)
    {
        $role->update(['name' => $request->name, 'title' => $request->title]);
        session()->flash('success', '角色修改成功');

        return back();
    }

    /**
     * 删除
     */
    public function destroy(Role $role)
    {
        $role->delete();
        session()->flash('success', '删除成功');

        return back();
    }

    /**
     * 权限设置界面
     *
     * @param \Spatie\Permission\Models\Role $role
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function permission(Role $role)
    {
        return view('admin::role.permission', compact('role'));
    }

    /**
     * 设置权限
     *
     * @param \Illuminate\Http\Request       $request
     * @param \Spatie\Permission\Models\Role $role
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function permissionStore(Request $request, Role $role)
    {
        $role->syncPermissions($request->input('name'));
        session()->flash("success", "权限设置成功");

        return back();
    }
}
