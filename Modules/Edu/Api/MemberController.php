<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use ActivityService;
use Modules\Edu\Entities\Duration;
use Modules\Edu\Entities\Order;
use Modules\Edu\Entities\Topic;
use Modules\Edu\Entities\UserVideo;
use Modules\Edu\Transformers\ActivityResource;
use Modules\Edu\Transformers\OrderResource;
use Modules\Edu\Transformers\TopicResource;
use Modules\Edu\Transformers\UserVideoResource;

/**
 * 会员中心相关
 * @package Modules\Edu\Api
 */
class MemberController extends Controller
{
    public function video(Request $request)
    {
        $videos = UserVideo::where('user_id', Auth::id())->with(['user', 'video.lesson'])->latest()->paginate(15);
        return UserVideoResource::collection($videos);
    }

    public function topic(Request $request)
    {
        $topics = Topic::where('user_id', Auth::id())->with(['user'])->latest()->paginate(15);
        return TopicResource::collection($topics);
    }

    public function order()
    {
        $orders = Order::where('site_id', SID)->where('user_id', Auth::id())->latest()->with(['user', 'lesson'])->where('status', 1)->paginate(15);
        return OrderResource::collection($orders);
    }

    public function duration()
    {
        $duration = Duration::where('site_id', SID)->where('user_id', Auth::id())->with('user')->first();
        return $duration;
    }
}
