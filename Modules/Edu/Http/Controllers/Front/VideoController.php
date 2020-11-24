<?php

namespace Modules\Edu\Http\Controllers\Front;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Entities\User;
use Modules\Edu\Entities\Video;
use Modules\Edu\Services\VideoService;

/**
 * 视频播放
 * @package Modules\Edu\Http\Controllers\Front
 */
class VideoController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth')->except(['index']);
  }

  public function index()
  {
    $videos = Video::latest('id')->paginate();

    return view('edu::front.video.index', compact('videos'));
  }

  public function show(Video $video, VideoService $videoService)
  {
    User::make()
      ->videos()
      ->syncWithoutDetaching($video);

    if ($videoService->check($video) === false) {
      return redirect()->route('Edu.front.subscribe.index');
    }
    return view('edu::front.video.show', compact('video'));
  }
}
