<?php

namespace Modules\Edu\Http\Controllers\Front;

use AlibabaCloud\Client\Exception\ClientException;
use App\Services\ConfigService;
use Illuminate\Http\RedirectResponse;
use Exception;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Log;
use Modules\Edu\Services\LiveService;
use Str;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

/**
 * 直播
 * @package Modules\Edu\Http\Controllers\Front
 */
class LiveController extends Controller
{
  public function index()
  {
    return view('edu::front.live.index');
  }

  /**
   * 推流
   * @param LiveService $liveService
   * @param ConfigService $configService
   * @return RedirectResponse
   * @throws Exception
   * @throws BindingResolutionException
   * @throws ClientException
   * @throws HttpException
   * @throws NotFoundHttpException
   */
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
    $configService->saveCurrentModuleConfig(['push' => $push, 'play' => $play, 'is_live' => true]);
    return back()->with('success', '推流成功');
  }

  /**
   * 通知
   * @param Request $request
   * @param ConfigService $configService
   * @return void
   * @throws BindingResolutionException
   * @throws HttpException
   * @throws NotFoundHttpException
   */
  public function notify(Request $request, ConfigService $configService)
  {
    switch ($request->action) {
      case 'publish_done':
        $configService->saveCurrentModuleConfig(['is_live' => false]);
        break;
      case 'publish':
        $configService->saveCurrentModuleConfig(['is_live' => true]);
        break;
    }
  }

  /**
   * 关闭直播
   * @param ConfigService $configService
   * @return RedirectResponse
   * @throws BindingResolutionException
   * @throws HttpException
   * @throws NotFoundHttpException
   */
  public function close(ConfigService $configService)
  {
    $configService->saveCurrentModuleConfig(['is_live' => false]);
    return back();
  }
}
