<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;

/**
 * 验证码
 * Class CaptchaController
 */
class CaptchaController extends Controller
{
  /**
   * 验证码
   * @return void
   */
  public function make()
  {
    return captcha();
  }
}
