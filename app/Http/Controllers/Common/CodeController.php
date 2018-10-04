<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Http\Controllers\Common;

use App\Exceptions\ValidException;
use App\Notifications\RegisterNotification;
use App\User;
use Houdunwang\Aliyun\Aliyun;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CodeController extends Controller
{
    public function send(Request $request)
    {
        $code = hd_random(4);
        $this->expireCheck();
        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)) {
            //邮箱
            $user = User::firstOrNew(['email' => $request->username]);
            $user->notify(new RegisterNotification($user, $code));
            $this->saveToSession($code, 'email', $request->username);
        } else {
            //手机短信
            $data = [
                //短信签名
                'sign'     => '后盾人',
                //短信模板
                'template' => 'SMS_15440200',
                //手机号
                'mobile'   => $request->username,
                //模板变量
                'vars'     => ["code" => $code, "product" => "后盾人"],
            ];
            Aliyun::instance('Sms')->send($data);
            $this->saveToSession($code, 'mobile', $request->username);
        }

        return ['code' => 0, 'message' => '验证码已经发送'];
    }

    //缓存记录
    protected function saveToSession($code, $type, $username)
    {
        session()->put('validate_code', [
            'code'     => $code,
            'type'     => $type,
            'username' => $username,
            'expire'   => time() + hd_config('base.code_expire'),
        ]);
    }

    protected function expireCheck()
    {
        $expire = session('validate_code.expire');
        if ($expire && time() < $expire) {
            throw new ValidException('验证码发送频繁，请稍候操作');
        }
    }
}
