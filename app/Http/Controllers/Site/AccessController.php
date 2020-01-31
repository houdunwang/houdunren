<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\User;
use Illuminate\Http\Request;

/**
 * 站长权限设置
 * Class AccessController
 * @package App\Http\Controllers\Site
 */
class AccessController extends ApiController
{
    public function __construct()
    {
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 获取用户站点权限
     * @param Site $site
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function index(Site $site, User $user)
    {
        return $this->success('', [
            'site_access' => $site->permissions,
            'user_permissions' => $user->permissions
        ]);
    }

    /**
     * 更新用户站点权限
     * @param Request $request
     * @param Site $site
     * @param User $user
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Site $site, User $user)
    {
        $user->permissions()->detach($site->permissions()->pluck('id'));
        $permissions = \GuzzleHttp\json_decode($request->input('permissions', '[]'));
        $user->permissions()->attach($permissions);
        return $this->success('权限更新成功', $site->permissions());
    }
}
