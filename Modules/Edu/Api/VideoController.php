<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Modules\Edu\Entities\Video;
use Modules\Edu\Services\VideoService;
use App\Models\Site;
use Illuminate\Http\RedirectResponse;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use Modules\Edu\Transformers\VideoResource;
use Modules\Edu\Transformers\CommentResource;
use Modules\Edu\Http\Requests\CommentRequest;
use Auth;
use ActivityService;
use Illuminate\Database\Eloquent\InvalidCastException;
use LogicException;
use Modules\Edu\Entities\User;

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
        return VideoResource::collection($videos);
    }

    /**
     * 获取视频
     * @param Video $video
     * @return VideoResource
     * @throws InvalidCastException
     * @throws LogicException
     */
    public function show(Video $video)
    {
        User::make()->videos()->syncWithPivotValues([$video['id']], ['site_id' => SID], false);
        return new VideoResource($video->load('lesson'));
    }
}
