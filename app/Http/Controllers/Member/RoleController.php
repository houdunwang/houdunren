<?php

namespace App\Http\Controllers\Member;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

/**
 * 会员角色管理
 * Class RoleController
 * @package App\Http\Controllers\Member
 */
class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Member-user');
    }

    public function edit(User $user)
    {
        $roles = Role::where('id','>', 1)->get();
        return view('member.role.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->get('role'));
        return redirect(route('member.user.index'))->with('success', '修改成功');
    }
}
