<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Resources\Admin\UserResource;
use App\Models\Site;
use App\Services\UserService;
use App\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

/**
 * 站点用户
 * Class UserController
 */
class UserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('site:admin');
    }

    /**
     * 用户列表支持关键词搜索
     * @param Request $request
     * @param Site $site
     * @param UserService $userService
     * @return AnonymousResourceCollection
     */
    public function index(Request $request, Site $site, UserService $userService)
    {
        $users = $userService->getByKeyword($site, $request->query('key'), ['user']);
        return UserResource::collection($users);
    }
    /**
     * 获取用户资料
     * @param Site $site
     * @param User $user
     * @return JsonResponse
     */
    public function get(Site $site, User $user)
    {
        return $this->json(new UserResource($user));
    }
}
