<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller as BaseController;
use Illuminate\Contracts\Container\BindingResolutionException;

class Controller extends BaseController
{
    /**
     * 登录字段
     * @return string
     * @throws BindingResolutionException
     */
    protected function account()
    {
        return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }

    /**
     * 帐号验证规则
     * 根据提交的帐号数据使用不同验证规则
     * @return string
     * @throws BindingResolutionException
     */
    protected function accountRule()
    {
        return filter_var(request()->account, FILTER_VALIDATE_EMAIL) ? 'email' : 'regex:/^1\d{10}$/';
    }
}
