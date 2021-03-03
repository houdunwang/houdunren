<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\OrderResource;
use Modules\Edu\Transformers\TopicResource;
use Auth;
use App\Models\Site;

/**
 * 用户相关
 * @package Modules\Edu\Api
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['topic']);
    }

    /**
     * 用户观看视频
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function video()
    {
        return User::make(Auth::user())->videos()->paginate(12);
    }

    /**
     * 贴子
     * @param Request $request
     * @return mixed
     */
    public function topic(Request $request, Site $site, User $user)
    {
        $topics = User::make($user)->topics()->latest()->paginate(15);
        return TopicResource::collection($topics);
    }

    /**
     * 订单
     * @return mixed
     */
    public function order()
    {
        $orders = User::make(Auth::user())->orders()->where('status', 1)->latest()->paginate(15);
        return OrderResource::collection($orders);
    }

    /**
     * 会员周期
     * @return mixed
     */
    public function duration()
    {
        return User::make(Auth::user())->duration;
    }
}
