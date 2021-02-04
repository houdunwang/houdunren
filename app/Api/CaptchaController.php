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
    public function create(Request $request)
    {
        return \Captcha::create('default', true);
    }
}
