<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use App\Models\Site;

/**
 * 关注
 * @package App\Http\Api
 */
class FollowController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 关注列表
     * @return AnonymousResourceCollection
     */
    public function index(Site $site, User $user)
    {
        $users = $user->followers()->paginate(18);
        return UserResource::collection($users);
    }

    /**
     * 关注
     * @param User $user
     * @return void
     * @throws BindingResolutionException
     */
    public function store(Site $site, User $user)
    {
        if ($user->id == Auth::id()) {
            abort(403, '不能关注自己');
        }
        if (!Auth::user()->isFollow($user)) {
            Auth::user()->followers()->sync($user, false);
        }
        return $this->message('关注成功');
    }

    /**
     * 取消关注
     * @param User $user
     * @return void
     */
    public function destroy(Site $site, User $user)
    {
        $user->fans()->detach(Auth::id());
        return $this->message('关注已取消');
    }
}
