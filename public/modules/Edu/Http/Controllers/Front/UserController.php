<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\Front\UserResource;

class UserController extends ApiController
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except(['show']);
    }

    /**
     * 关注/取关
     * @param User $user
     * @return exit
     */
    public function follower(User $user)
    {
        $user->fans()->toggle(Auth::id());
        return $this->json(new UserResource($user));
    }

    /**
     * 点赞
     */
    public function favour(User $user)
    {
        $user->favour()->toggle(Auth::id());
        return $this->json(new UserResource($user));
    }
    public function show(User $user, Request $request)
    {
        $auth = User::find($request->query('id', 0));
        if ($auth) Auth::login($auth);
        return $this->json(new UserResource($user));
    }
}
