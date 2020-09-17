<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use App\Models\WeChat;
use App\Models\WeChatUser;
use Auth;
use Houdunwang\WeChat\Auth as WeChatAuth;

class WeChatController extends Controller
{
    public function __construct()
    {
        $this->middleware('front');
    }

    protected function driver()
    {
        if (is_wechat()) {
            $wechat = WeChat::find(config('site.user.wechat_login_id'));
            config([
                'services.weixin' => [
                    'client_id' => $wechat['appID'],
                    'client_secret' => $wechat['appsecret'],
                    'redirect' => route('auth.login.wechat.callback'),
                ],
            ]);
            return Socialite::driver('weixin');
        }
        config([
            'services.weixinweb' => [
                'client_id' => config('site.user.wechatweb_client_id'),
                'client_secret' => config('site.user.wechatweb_client_secret'),
                'redirect' => route('auth.login.wechat.callback'),
            ],
        ]);
        return Socialite::driver('weixinweb');
    }
    /**
     * 将用户重定向到授权页面
     *
     * @return \Illuminate\Http\Response
     */
    public function redirectToProvider(WeChatAuth $auth)
    {
        return $this->driver()->redirect();
    }

    /**
     * 获取用户信息
     * 下面有表操作，请根据你项目进行修改
     * @return \Illuminate\Http\Response
     */
    public function handleProviderCallback()
    {
        $account = $this->driver()->user();

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
