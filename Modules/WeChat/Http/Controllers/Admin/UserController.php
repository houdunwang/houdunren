<?php

namespace Modules\WeChat\Http\Controllers\Admin;

use App\Http\Controllers\Auth\Controller;
use App\Models\WeChatUser;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\WeChat;

/**
 * 粉丝管理
 * @package App\Http\Controllers\WeChat
 */
class UserController extends Controller
{
  public function search(Request $request, WeChat $wechat)
  {
    $users = User::whereHas('wechatUser', function ($query) use ($wechat) {
      $query->where('site_id', site()['id'])->where('wechat_id', $wechat['id']);
    })
      ->with('wechatUser')
      ->limit(10)
      ->get();

    return $users;
  }

  public function index(Request $request, WeChat $wechat = null, WechatUser $weChatUser)
  {
    $wechat = $wechat ?? site()->wechats()->first();

    $users = WeChatUser::where('wechat_id', $wechat['id'])->paginate();
    return view('wechat::admin.user.index', compact('users', 'wechat'));
  }
}
