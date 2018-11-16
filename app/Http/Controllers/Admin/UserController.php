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

use App\Repositories\UserRepository;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

/**
 * 会员管理
 * Class UserController
 * @package App\Http\Controllers\Core
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Admin-user');
    }

    public function index(Request $request, UserRepository $repository)
    {
        $users = $repository->search($request->query('w'));

        return view('admin.user.index', compact('users'));
    }

    public function edit(User $user)
    {
        $roles = Role::where('id', '>', 1)->get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->get('role'));
        return redirect(route('admin.user.index'))->with('success', '修改成功');
    }
}
