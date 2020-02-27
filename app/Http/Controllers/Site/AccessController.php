<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Servers\AccessServer;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Permission;

/**
 * 站长权限设置
 * Class AccessController
 * @package App\Http\Controllers\Site
 */
class AccessController extends ApiController
{
    public function __construct()
    {
        $this->middleware('siteAuth:admin');
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 站点权限列表
     * @param Site $site
     * @param AccessServer $accessServer
     * 
     * @return mixed
     */
    public function sitePermission(Site $site, AccessServer $accessServer)
    {
        //更新站点权限，用于新模块的权限添加
        $accessServer->updateSitePermission($site);
        return $this->success('站点权限列表', $accessServer->getSiteAccess($site));
    }

    /**
     * 获取用户站点权限
     * @param Site $site
     * @param User $user
     * 
     * @return JsonResponse
     */
    public function userPermission(Site $site, User $user)
    {
        return $this->success('用户拥有的站点权限', $user->permissions);
    }

    /**
     * 更新用户站点权限
     * @param Request $request
     * @param Site $site
     * @param User $user
     * 
     * @return JsonResponse
     */
    public function update(Request $request, Site $site, User $user)
    {
        DB::table('model_has_permissions')->where('model_id', $user['id'])
            ->whereIn('permission_id', $site->permissions->pluck('id'))
            ->delete();

        $user->givePermissionTo(
            Permission::whereIn('id', $request->input('access'))->pluck('name')
        );
        return $this->success('权限更新成功');
    }
}
