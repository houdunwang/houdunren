<?php

namespace App\Http\Controllers;

use App\Services\WechatService;
use Illuminate\Support\Facades\Cache;
use Request;
use Houdunwang\Wechat\User as WechatUser;
use Houdunwang\Wechat\Qrcode;
use Route;
use URL;

//微信登录
class WechatLoginController extends Controller
{
    protected $qr;

    public function __construct()
    {
        $this->qr = app(Qrcode::class)->config(config('hd.wechat'));
    }

    //生成PC登录微信二维码资料用于生成图片使用
    public function scanloginQr()
    {
        $info = $this->qr->getQrTicket([
            "expire_seconds" => 600,
            "action_name" => "QR_STR_SCENE",
            "action_info" => ["scene" => ["scene_str" => "bind"]],
        ]);

        return $this->respondWithSuccess($info);
    }

    //使用ticket换取微信二维码图片
    public function scanLoginQrImage(string $ticket)
    {
        return $this->qr->getQrImageByTicket($ticket);
    }

    //PC扫码登录
    public function sancLogin(string $ticket)
    {
        if ($info = Cache::get($ticket)) {
            Cache::forget($ticket);
            $user = app(WechatService::class)->registerByOpenid($info['FromUserName']);
            return $this->respondWithSuccess(['token' => $user->createToken('auth')->plainTextToken]);
        }
    }

    //微信APP客户端登录
    public function appLogin()
    {
        $info = app(WechatUser::class)->config(config('hd.wechat'))->snsapiUserInfo();
        app(WechatService::class)->registerByOpenid($info['openid']);
        return redirect('/');
        // return view('wechat-login-by-token', ['token' => $user->createToken('auth')->plainTextToken]);
    }
}
