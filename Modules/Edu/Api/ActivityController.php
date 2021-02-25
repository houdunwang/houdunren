<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use ActivityService;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Modules\Edu\Transformers\ActivityResource;
use App\Models\Site;
use App\Models\User;

/**
 * 用户活动
 * @package Modules\Edu\Http\Controllers\Front
 */
class ActivityController extends Controller
{
    /**
     * 动态列表
     * @return AnonymousResourceCollection
     */
    public function index()
    {
        $activities = ActivityService::all(15);
        return ActivityResource::collection($activities);
    }

    /**
     * 获取用户动态
     * @param Site $site
     * @param User $user
     * @return AnonymousResourceCollection
     */
    public function user(Site $site, User $user)
    {
        $activities = ActivityService::user($user, 15);
        return ActivityResource::collection($activities);
    }
}
