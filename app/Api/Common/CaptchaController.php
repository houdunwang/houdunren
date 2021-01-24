<?php

namespace App\Api\Common;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Captcha;

/**
 * 发送验证码
 * @package App\Http\Controllers\Common
 */
class CaptchaController extends Controller
{
    public function make()
    {
        return Captcha::create('default', true);
    }
}
