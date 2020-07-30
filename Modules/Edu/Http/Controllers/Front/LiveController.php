<?php

namespace Modules\Edu\Http\Controllers\Front;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Log;
use Modules\Edu\Services\LiveService;

class LiveController extends Controller
{
    public function create(LiveService $liveService)
    {
        $url = $liveService->pushUrl('play.houdunren.com', 'houdunren', 'xj', 'BL1VCz2E0U');
        dump($url);

        $play = $liveService->playUrl('live.houdunren.com', 'houdunren', 'xj', 'BL1VCz2E0U');
        dump($play);

        $info = $liveService->notify();
        dump($info);
    }

    public function notify(Request $request)
    {
        Log::info($request->all());
    }
}
