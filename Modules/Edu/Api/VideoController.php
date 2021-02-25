<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Video;
use App\Models\Site;
use Modules\Edu\Transformers\VideoResource;
use Illuminate\Database\Eloquent\InvalidCastException;
use LogicException;
use Modules\Edu\Entities\User;
use Modules\Edu\Entities\UserVideo;
use Auth;
use Modules\Edu\Transformers\UserVideoResource;

/**
 * 视频播放
 * @package Modules\Edu\Http\Controllers\Front
 */
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index', 'PlayList']);
    }

    /**
     * 用户观看列表
     * @return mixed
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function PlayList(Site $site)
    {
        $userVideos = UserVideo::with(['video', 'user'])->where('site_id', $site['id'])->latest('updated_at')->limit(10)->get();
        return UserVideoResource::collection($userVideos);
    }

    /**
     * 最新课程
     * @return mixed
     */
    public function index(Site $site)
    {
        $videos = Video::where('site_id', $site->id)->latest('id')->paginate(15);
        return VideoResource::collection($videos);
    }

    /**
     * 获取视频
     * @param Video $video
     * @return VideoResource
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function show(Site $site, Video $video)
    {
        User::make(Auth::user())->videos()->syncWithPivotValues([$video['id']], ['site_id' => $site['id']], false);
        return new VideoResource($video->load('lesson.videos'));
    }
}
