<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\CaptchaService;
use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;
use Gregwar\Captcha\CaptchaBuilder;

/**
 * 验证码
 * Class CaptchaController
 */
class CaptchaController extends Controller
{
  public function make(CaptchaService $captchaService)
  {
    return captcha();
    // return $captchaService->make();
  }
}
