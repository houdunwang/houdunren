<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
  /**
   * 获取登录帐号类型（表字段）
   */
  protected function account()
  {
    return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
  }

  /**
   * 帐号验证规则
   * 根据提交的帐号数据使用不同验证规则
   */
  protected function accountRule()
  {
    return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'regex:/^1\d{10}$/';
  }
}
