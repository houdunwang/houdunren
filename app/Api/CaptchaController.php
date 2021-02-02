<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 帐号登录注册管理
 * @package App\Api\User
 */
class CaptchaController extends Controller
{

    public function create(Request $request)
    {
        return \Captcha::create('default', true);
    }
}
