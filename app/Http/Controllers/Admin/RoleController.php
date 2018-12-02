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

/**
 * 角色管理
 * Class RoleController
 * @package App\Http\Controllers\Admin
 */
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Admin-role');
    }

    public function index()
    {
        $roles = Role::where('id', '>', 2)->get();
        return view('admin.role.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.role.create');
    }

    public function store(RoleRequest $request, Role $role)
    {
        $role->create($request->only(['name', 'title']));
        return redirect(route('admin.role.index'))->with('success', '角色添加成功');
    }

    public function edit(Role $role)
    {
        return view('admin.role.edit', compact('role'));
    }

    public function update(RoleRequest $request, Role $role)
    {
        $role->update($request->only('name'));
        return redirect(route('admin.role.index'))->with('success', '修改成功');
    }

    public function destroy(Role $role)
    {
        $role->delete();
        return redirect(route('admin.role.index'))->with('success', '删除成功');
    }
}
