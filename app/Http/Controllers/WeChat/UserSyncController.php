<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use App\Models\WeChat;
use Houdunwang\WeChat\User;
use App\Services\WeChatService;
use Illuminate\Http\Request;
use App\Models\Site;

/**
 * 同步微信服务器粉丝
 * @package App\Http\Controllers\WeChat
 */
class UserSyncController extends Controller
{

  public function sync(Request $request, Site $site, WeChat $wechat, string $openid, User $userPackage, WeChatService $weChatService)
  {
    $response = $userPackage->config($wechat)->getList($openid ?? null);
    session(['next_openid' => $response['next_openid']]);
    if (!isset($response['data'])) {
      return response()->json(['state' => 1]);
    }
    $users = $userPackage->getByOpenids($response['data']['openid'])['user_info_list'];

    $weChatService->batchSaveUsers(array_map(function ($v) use ($wechat) {
      $v['wechat_id'] = $wechat['id'];
      return $v;
    }, $users));

    return response()->json(array_filter($response, function ($k) {
      return $k != 'data';
    }, ARRAY_FILTER_USE_KEY) + ['state' => 0]);
  }
}
