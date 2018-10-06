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
use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        access('Admin-role-permission');
        $modules = Module::get();
        return view('admin.permission_index', compact('modules'));
    }

    public function edit(Role $role)
    {
        access('Admin-role-permission');
        $modules = Module::get();
        return view('admin.permission_edit', compact('modules', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        access('Admin-role-permission');
        $role->syncPermissions($request->get('permission', []));
        return back()->with('success', '权限设置成功');
    }

    public function updateCache()
    {
        access('Admin-role-permission');
        app()['cache']->forget('spatie.permission.cache');
        return back()->with('success', '缓存更新成功');
    }
}
