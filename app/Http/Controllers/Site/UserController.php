<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\ApiController;
use App\Http\Resources\UserResource;
use App\Models\Site;
use App\User;

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

    public function index(Site $site)
    {
        $users = $site->user;
        return $this->json(UserResource::collection($users));
    }

    public function get(Site $site, User $user)
    {
        return $this->success('用户资料', new UserResource($user));
    }
}
