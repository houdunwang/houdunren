<?php

namespace App\Http\Controllers\Util;

use App\Exceptions\ValidException;
use App\Mail\RegisterMail;
use App\Notifications\RegisterNotification;
use App\User;
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
        } else {
            //手机
        }
        $request->session()->put('validate_code', ['code' => $code, 'expire' => time() + 60]);
        return ['code' => 0, 'message' => '验证码已经发送'];
    }

    protected function expireCheck()
    {
        $expire = session('validate_code.expire');
        if ($expire && time() < $expire) {
            throw new ValidException('验证码发送频繁，请稍候操作');
        }
    }
}
