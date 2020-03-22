<?php

namespace App\Http\Controllers\Common;

use App\Http\Controllers\Controller;
use App\Services\CaptchaService;
use Intervention\Image\ImageManager;

/**
 * 验证码
 * Class CaptchaController
 */
class CaptchaController extends Controller
{
  /**
   * BASE64验证码
   * @return void
   */
  public function text(CaptchaService $captchaService)
  {
    return $captchaService->make();
  }

  /**
   * 图片验证码
   * @return array|ImageManager|mixed
   */
  public function image()
  {
    return captcha();
  }
}
