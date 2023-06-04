<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSoftTokenRequest;
use App\Http\Requests\UpdateSoftTokenRequest;
use App\Models\Soft;
use App\Models\SoftToken;
use App\Models\User;
use Auth;

class SoftTokenController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:sanctum')->except([]);
    }

    //获取软件令牌TOKEN
    public function getSoftToken(string $softName)
    {
        $soft = Soft::whereName($softName)->first();
        if (!$soft) return $this->respondNotFound('软件已下架');

        $user = User::whereSecret(request('secret', '@@@'))->first();
        if (!$user) return $this->respondUnAuthenticated('帐号不存在');

        if (!$user->isSubscribe) return $this->respondForbidden('你没有订阅');

        //每次登录重置TOKEN，软件同时只能一个人使用
        $user->softTokens()->where('soft_id', $soft->id)->delete();

        //生成软件授权令牌
        $token = md5($user->id . now());
        $user->softTokens()->create([
            'token' => $token,
            'soft_id' => $soft->id
        ]);

        return $this->respondWithSuccess(["token" => $token]);
    }

    //校对令牌
    public function check(string $softName)
    {
        $soft = Soft::whereName($softName)->first();
        if (!$soft) return $this->respondNotFound('软件已下架');
        $softToken  = SoftToken::where('soft_id', $soft->id)->whereToken(request('token'))->first();
        if (!$softToken) return $this->respondForbidden("令牌无效或其他用户正在使用该软件");

        if (!$softToken->user->isSubscribe) return $this->respondForbidden('订阅已经失效');

        return $this->respondOk('令牌TOKEN正确');
    }
}
