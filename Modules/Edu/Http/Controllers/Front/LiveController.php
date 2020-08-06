<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Services\ConfigService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Log;
use Modules\Edu\Services\LiveService;
use Str;

class LiveController extends Controller
{
    public function index()
    {
        return view('edu::live.index');
    }

    public function push(LiveService $liveService, ConfigService $configService)
    {
        $liveName = Str::random(8);
        $push = $liveService->pushUrl(config('module.live.push_url'), 'houdunren', $liveName, config('module.live.push_key'));

        $play = $liveService->playUrl(config('module.live.play_url'), 'houdunren', $liveName, config('module.live.play_key'));

        $info = $liveService->notify(
            config('site.aliyun.accessKeyId'),
            config('site.aliyun.accessKeySecret'),
            config('module.live.push_url'),
            route('Edu.front.live.notify')
        );

        Log::info($info);

        $configService->saveCurrentModuleConfig(['push' => $push, 'play' => $play]);

        return back()->with('success', '推流成功');
    }

    public function notify(Request $request, ConfigService $configService)
    {
        // Log::info($request->all());
        switch ($request->action) {
            case 'publish_done':
                $configService->saveCurrentModuleConfig(['is_live' => false]);
                break;
            case 'publish':
                $configService->saveCurrentModuleConfig(['is_live' => true]);
                break;
        }
    }
}
