<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Site;

use App\Models\Site;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

/**
 * 站点操作员
 * Class UserController
 * @package App\Http\Controllers\Site
 */
class UserController extends Controller
{
    public function index(Site $site)
    {
        $this->authorize('update', $site);
        return view('site.user.index', compact('site'));
    }

    /**
     * 设置站点操作员
     * @param Site $site
     * @param User $user
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function update(Site $site, User $user)
    {
        $this->authorize('update', $site);
        $user->sites()->toggle([$site['id'] => ['role' => 'operator']]);
        //删除操作员时同时移除权限数据
        if (!$site->user->contains($user)) {
            $user->permissions()->detach($site->permissions->pluck('id')->toArray());
        }
        if (request()->expectsJson()) {
            return response()->json(['message' => '操作员设置成功', 'code' => 0]);
        } else {
            return back()->with('success', '操作员设置成功');
        }
    }

    /**
     * 搜索用户
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function search(Request $request)
    {
        //排除用户字段
        $id = request()->query('id', '');
        if ($w = $request->input('w')) {
            $users = User::where('name', 'like', "%$w%")
                ->orWhere('email', 'like', "%$w%")
                ->orWhere('mobile', 'like', "%$w%")->paginate(10);
        } else {
            $users = User::whereNotIn('id', explode(',', $id))->paginate(8);
        }
        return view('site.user.search', compact('users'));
    }
}
