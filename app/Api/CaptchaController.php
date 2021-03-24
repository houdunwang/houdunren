<?php

namespace App\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

/**
 * 图形验证码
 * @package App\Api
 */
class CaptchaController extends Controller
{
    /**
     * 生成API验证码
     * @param Request $request
     * @return mixed
     */
    public function make(Request $request)
    {
        return \Captcha::create('default', true);
    }
}
