<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\UserVideo;
use Modules\Edu\Transformers\UserVideoResource;

/**
 * 用户观看视频
 * @package Modules\Edu\Api
 */
class UserVideoController extends Controller
{
    /**
     * 用户观看视频列表
     * @return mixed
     */
    public function index()
    {
        $videos = UserVideo::where('site_id', SID)->with(['user', 'video'])->limit(15)->latest()->get();
        return UserVideoResource::collection($videos);
    }
}
