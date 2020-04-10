<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Models\Site;
use App\Services\AccessService;
use App\Services\ModuleService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * 站长权限设置
 * Class AccessController
 * @package App\Http\Controllers\Site
 */
class AccessController extends ApiController
{
    public function __construct()
    {
        $this->middleware('site:admin');
        $this->authorizeResource(Site::class, 'site');
    }

    /**
     * 站点权限列表
     * @param Site $site
     * @param ModuleService $ModuleService
     *
     * @return mixed
     */
    public function site(Site $site, ModuleService $ModuleService, AccessService $AccessService)
    {
        $AccessService->updateSitePermission($site);
        return $this->json($ModuleService->getSiteModule($site));
    }

    /**
     * 获取用户站点权限
     * @param Site $site
     * @param User $user
     *
     * @return JsonResponse
     */
    public function userPermission(Site $site, User $user, AccessService $AccessService)
    {
        $permissions = $AccessService->getUserPermissionNames($site, $user);
        return $this->json($permissions);
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

        $user->givePermissionTo($request->input('permissions'));
        return $this->success('权限更新成功');
    }
}
