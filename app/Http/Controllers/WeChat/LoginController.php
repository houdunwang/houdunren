<?php

namespace App\Http\Controllers\WeChat;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WeChatService;

/**
 * 微信登录
 * @package App\Http\Controllers\Auth
 */
class LoginController extends Controller
{
  public function __construct()
  {
    $this->middleware('front');
  }

  /**
   * 将用户重定向到授权页面
   *
   * @return \Illuminate\Http\Response
   */
  public function redirectToProvider(WeChatService $weChatService)
  {
    return $weChatService->driver()->redirect();
  }

  /**
   * 获取用户信息
   * 下面有表操作，请根据你项目进行修改
   * @return \Illuminate\Http\Response
   */
  public function handleProviderCallback(WeChatService $weChatService)
  {
    $account = $weChatService->driver()->user();

    $weChatService->login(
      $account->user + [
        'type' => is_wechat() ? 'wechat' : 'web',
        'wechat_id' => is_wechat() ? config('site.user.wechat_login_id') : null,
      ]
    );

    return redirect()
      ->intended('/')
      ->with('success', '欢迎回来');
  }
}
