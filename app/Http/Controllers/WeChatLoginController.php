<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use App\Models\WeChatUser;
use Auth;
use WeChatService;

/**
 * 微信登录
 * @package App\Http\Controllers
 */
class WeChatLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware(['module', 'guest']);
    }

    /**
     * 将用户重定向到授权页面
     *
     * @return \Illuminate\Http\Response
     */
    public function login()
    {
        return \Socialite::driver(WeChatService::isWechat() ? 'weixin' : 'weixinweb')->redirect();
    }

    /**
     * 获取用户信息
     * 下面有数据表操作，请根据你项目进行修改
     * @return \Illuminate\Http\Response
     */
    public function loginCallback()
    {
        $info = Socialite::driver(WeChatService::isWechat() ? 'weixin' : 'weixinweb')->user();
        $unionid = $info->unionid ?? null;
        if ($unionid) {
            $wechatUser = WeChatUser::where('unionid', $info->unionid)->first();
        } else {
            $wechatUser = WeChatUser::where('openid', $info->getId())->first();
        }
        if (!$wechatUser) {
            $user = User::create([
                'avatar' => $info->user['headimgurl'],
                'name' => $info->user['nickname'],
            ] + $info->user);
            $wechatUser = WeChatUser::create($info->user + ['user_id' => $user->id, 'site_id' => SID]);
        }
        Auth::login($wechatUser->user);
        return redirect()->intended('/');
    }
}
