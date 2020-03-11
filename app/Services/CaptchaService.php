<?php

namespace App\Services;

use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Str;
use Gregwar\Captcha\CaptchaBuilder;
use Gregwar\Captcha\PhraseBuilder;

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

    $uuid = $this->uuid();
    Cache::put($uuid, $captcha->getPhrase(), now()->addMinutes(2));
    return ['uuid' => $uuid, 'base64' => $captcha->inline()];
  }

  protected function uuid()
  {
    return (string) Str::uuid();
  }

  /**
   * 验证码比较
   * @param string $uuid
   * @param string $captcha
   *
   * @return void
   */
  public function validate(string $uuid, string $captcha)
  {
    return strtoupper(Cache::get($uuid)) === strtoupper($captcha);
  }
}
