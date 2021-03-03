<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\WeChatUser;
use Auth;
use Illuminate\Contracts\Container\BindingResolutionException;
use Symfony\Component\Routing\Exception\RouteNotFoundException;
use InvalidArgumentException;

/**
 * 微信登录
 * @package App\Http\Controllers
 */
class WeChatBindController extends Controller
{
    public function __construct()
    {
        $this->middleware(['module', 'auth:sanctum']);
    }

    /**
     * 将用户重定向到授权页面
     *
     * @return \Illuminate\Http\Response
     */
    public function bind()
    {
        config(['services.weixinweb.redirect' => route('wechat.bind.callback')]);
        return \Socialite::driver('weixinweb')->redirect();
    }

    /**
     * 获取用户信息
     * 下面有数据表操作，请根据你项目进行修改
     * @return \Illuminate\Http\Response
     */
    public function bindCallback()
    {
        $info = Socialite::driver('weixinweb')->user();
        $unionid = $info->unionid ?? null;
        if ($unionid) {
            $wechatUser = WeChatUser::where('unionid', $info->unionid)->first();
        } else {
            $wechatUser = WeChatUser::where('openid', $info->getId())->first();
        }
        if ($wechatUser) {
            session()->flash('message', '该微信已经绑定过');
            return redirect('/member/info/wechat');
        }
        WeChatUser::create($info->user + ['user_id' => Auth::id(), 'site_id' => SID]);
        return redirect('/member/info/wechat');
    }
}
