<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Entities\User;
use Modules\Edu\Transformers\OrderResource;
use Modules\Edu\Transformers\TopicResource;

/**
 * 用户相关
 * @package Modules\Edu\Api
 */
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 用户观看视频
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function video()
    {
        return User::make()->videos()->paginate(12);
    }

    /**
     * 贴子
     * @param Request $request
     * @return mixed
     */
    public function topic(Request $request)
    {
        $topics = User::make()->topics()->latest()->paginate(15);
        return TopicResource::collection($topics);
    }

    /**
     * 订单
     * @return mixed
     */
    public function order()
    {
        $orders = User::make()->orders()->latest()->paginate(15);
        return OrderResource::collection($orders);
    }

    /**
     * 会员周期
     * @return mixed
     */
    public function duration()
    {
        return User::make()->duration;
    }
}
