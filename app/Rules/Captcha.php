<?php

namespace App\Rules;

use App\Services\CaptchaService;
use Illuminate\Contracts\Validation\Rule;

/**
 * 验证码验证规则
 * @package App\Rules
 */
class Captcha implements Rule
{
  /**
   * Create a new rule instance.
   *
   * @return void
   */
  public function __construct()
  {
    //
  }

  /**
   * Determine if the validation rule passes.
   *
   * @param  string  $attribute
   * @param  mixed  $value
   * @return bool
   */
  public function passes($attribute, $value)
  {
    return app(CaptchaService::class)->validate($value);
  }

  /**
   * Get the validation error message.
   *
   * @return string
   */
  public function message()
  {
    return '验证码输入错误';
  }
}
