<?php

namespace Modules\WeChat\Http\Controllers\Admin;

use App\Http\Controllers\Auth\Controller;
use App\Models\WeChatUser;
use Illuminate\Http\Request;
use App\Models\WeChat;
use Illuminate\View\View;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Container\BindingResolutionException;

/**
 * 粉丝管理
 * @package App\Http\Controllers\WeChat
 */
class UserController extends Controller
{

  /**
   * 粉丝列表
   * @param Request $request
   * @param WeChat|null $wechat
   * @param WeChatUser $weChatUser
   * @return View|Factory
   * @throws BindingResolutionException
   */
  public function index(Request $request, WeChat $wechat = null, WechatUser $weChatUser)
  {
    $wechat = $wechat ?? site()->wechats()->first();

    $users = WeChatUser::where('wechat_id', $wechat['id'])->paginate();
    return view('wechat::admin.user.index', compact('users', 'wechat'));
  }
}
