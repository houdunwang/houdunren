<?php

namespace App\Http\Controllers\Site;

use App\Models\Site;
use App\Http\Controllers\Controller;
use App\User;

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
}
