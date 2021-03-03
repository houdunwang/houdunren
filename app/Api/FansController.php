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
 * 粉丝
 * @package App\Api
 */
class FansController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index']);
    }

    /**
     * 关注列表
     * @return AnonymousResourceCollection
     */
    public function index(Site $site, User $user)
    {
        $users = $user->fans()->paginate(18);
        return UserResource::collection($users);
    }
}
