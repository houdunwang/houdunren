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

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;

/**
 * 后台会员管理
 * Class UserController
 * @package App\Http\Controllers\Core
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin:Admin-user');
    }

    public function index(Request $request)
    {
        $users = User::byEmail($request->query('email'))
            ->byMobile($request->query('mobile'))->paginate(15);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(User $user)
    {
        //
    }

    public function edit(User $user)
    {
        $roles = Role::where('id', '>', 1)->get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    public function update(Request $request, User $user)
    {
        $user->assignRole($request->get('role'));
        return redirect(route('admin.user.index'))->with('success', '修改成功');
    }

    public function destroy(User $user)
    {
        //
    }
}
