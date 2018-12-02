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
        $this->middleware('admin:Admin-manage');
    }

    /**
     * 管理员列表
     * @param Request $request
     * @param UserRepository $repository
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(UserRepository $repository)
    {
        $users = $repository->admin();
        return view('admin.user.index', compact('users'));
    }

    /**
     * 设置管理员角色
     * @param User $user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(User $user)
    {
        $roles = Role::where('id', '>', 1)->get();
        return view('admin.user.edit', compact('user', 'roles'));
    }

    /**
     * 更新管理员角色
     * @param Request $request
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, User $user)
    {
        $user->syncRoles($request->get('role'));
        return redirect(route('admin.user.index'))->with('success', '修改成功');
    }
}
