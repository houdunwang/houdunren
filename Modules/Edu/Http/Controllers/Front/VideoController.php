<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\Video;
use Modules\Edu\Services\VideoService;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $videos =  Video::latest('id')->paginate();

        return view('edu::video.index', compact('videos'));
    }
    public function show(Video $video, VideoService $videoService)
    {
        if ($videoService->check($video) === false) {
            return back()->with('danger', '你没有查看权限');
        }
        $video->with('lesson');
        return view('edu::video.show', compact('video'));
    }
}
