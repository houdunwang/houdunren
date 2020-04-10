<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\Services\SiteService;
use App\Services\UserService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
 * 站点管理员
 * Class AdminController
 * @package App\Http\Controllers\Site
 */
class AdminController extends ApiController
{
    public function __construct()
    {
        $this->middleware('site:admin');
    }

    /**
     * 根据关键词搜索用户
     * @param Request $request
     * @param Site $site
     * @param UserService $userService
     * @return JsonResponse
     */
    public function search(Request $request, Site $site, UserService $userService)
    {
        $users = $userService->getByKeyword($site, $request->input('content'), ['user']);
        return $this->json(UserResource::collection($users));
    }

    /**
     * 获取操作员
     * @param Site $site
     * @return JsonResponse
     */
    public function index(Site $site)
    {
        $users = $site->operator;
        return $this->json(UserResource::collection($users));
    }

    //添加操作员
    public function add(Request $request, Site $site)
    {
        array_map(function ($uid) use ($site) {
            $site->user()->updateExistingPivot($uid, ['role' => 'operator']);
        }, $request->input('users'));

        return $this->success('设置成功');
    }

    /**
     * 移除操作员
     * @param Request $request
     * @param Site $site
     * @return JsonResponse
     */
    public function remove(Request $request, Site $site)
    {
        array_map(function ($uid) use ($site) {
            $isAdmin =  app(UserService::class)->isAdmin($site, User::find($uid));
            if (!$isAdmin)
                $site->user()->updateExistingPivot($uid, ['role' => 'user']);
        }, $request->input('users'));
        return $this->success('设置成功');
    }
}
