<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoleRequest;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        access('Admin-role');
        $roles = Role::where('id', '>', 1)->get();
        return view('admin.role_index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role_create');
    }

    public function store(RoleRequest $request, Role $role)
    {
        $role->create($request->only(['name', 'title']));
        return redirect(route('admin.role.index'))->with('success', '角色添加成功');
    }

    public function show(Role $role)
    {
        //
    }

    public function edit(Role $role)
    {
        return view('admin.role_edit', compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->only('name'));
        return redirect(route('admin.role.index'))->with('success', '修改成功');
    }

    public function destroy(Role $role)
    {
        $this->authorize('delete', $role);
        $role->delete();
        return redirect(route('admin.role.index'))->with('success', '删除成功');
    }
}
