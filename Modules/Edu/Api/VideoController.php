<?php

namespace Modules\Edu\Api;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Video;
use Modules\Edu\Services\VideoService;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Modules\Edu\Transformers\VideoResource;

/**
 * 视频播放
 * @package Modules\Edu\Http\Controllers\Front
 */
class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum'])->except(['index']);
    }

    /**
     * 最新课程
     * @return mixed
     */
    public function index()
    {
        $videos = Video::latest('id')->paginate(15);
        return $videos;
    }

    /**
     * 获取视频
     * @param Site $site
     * @param Video $video
     * @param VideoService $videoService
     * @return RedirectResponse|Video
     * @throws BindingResolutionException
     * @throws RouteNotFoundException
     */
    public function show(Video $video, VideoService $videoService)
    {
        return new VideoResource($video->load('lesson'));
    }
}
