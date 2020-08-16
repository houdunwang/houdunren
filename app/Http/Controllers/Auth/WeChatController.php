<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Socialite;
use App\Models\User;
use Auth;

class WeChatController extends Controller
{
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
            $user = User::where('unionid', $account->unionid)->first();
        } else {
            $user = User::where('openid', $account->getId())->first();
        }
        if (!$user) {
            $user =  User::create([
                'avatar' => $account->user['headimgurl'],
                'openid' => $account->getId(),
                'unionid' => $unionid,
                'name' => $account['nickname']
            ]);
            Auth::login($user);
        }
        return redirect()->intended('/');
    }
}
