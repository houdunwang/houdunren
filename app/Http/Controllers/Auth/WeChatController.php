<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use App\Models\WeChatUser;
use Auth;

class WeChatController extends Controller
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
  public function redirectToProvider()
  {
    return Socialite::driver('weixinweb')->redirect();
  }

  /**
   * 获取用户信息
   * 下面有表操作，请根据你项目进行修改
   * @return \Illuminate\Http\Response
   */
  public function handleProviderCallback()
  {
    $account = Socialite::driver('weixinweb')->user();

    $unionid = $account->unionid ?? null;
    if ($unionid) {
      $wechatUser = WeChatUser::where('unionid', $account->unionid)->first();
    } else {
      $wechatUser = WeChatUser::where('openid', $account->getId())->first();
    }
    if (!$wechatUser) {
      $user = User::create([
        'avatar' => $account->user['headimgurl'],
        'name' => $account['nickname'],
      ]);
      $wechatUser = WeChatUser::create([
        'user_id' => $user['id'],
        'site_id' => site()['id'],
        'openid' => $account->getId(),
        'unionid' => $unionid,
      ]);
    }
    Auth::login($wechatUser->user);
    return redirect()
      ->intended('/')
      ->with('success', '欢迎回来');
  }
}
