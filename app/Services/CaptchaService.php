<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;
use Illuminate\Support\Facades\Request;

/**
 * 验证码服务
 * Class CaptchaService
 */
class CaptchaService
{
  /**
   * 生成验证码
   * @return array
   */
  public function make()
  {
    //四位验证码
    $phraseBuilder = new PhraseBuilder(4);
    $captcha = (new CaptchaBuilder(null, $phraseBuilder))->build();

    Cache::put($this->name(), $captcha->getPhrase(), now()->addMinutes(10));
    return $captcha->inline();
  }

  protected function name()
  {
    return request()->getClientIp() . 'captcha';
  }

  /**
   * 验证码比较
   * @param string $uuid
   * @param string $captcha
   *
   * @return void
   */
  public function validate(string $value)
  {
    $captcha =  Cache::get($this->name(), '');
    return strtoupper($captcha) === strtoupper($value);
  }
}
