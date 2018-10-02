<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function edit(Role $role)
    {
        $modules = Module::get();
        return view('admin.permission_edit', compact('modules', 'role'));
    }

    public function update(Request $request, Role $role)
    {
        $role->syncPermissions($request->get('permission', []));
        return back()->with('success', '权限设置成功');
    }
}
