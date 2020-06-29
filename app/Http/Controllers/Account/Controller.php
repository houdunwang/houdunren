<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller as BaseController;

class Controller extends BaseController
{
    /**
     * 获取登录字段
     * @return string
     */
    protected function username()
    {
        return filter_var(request()->input('account'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
    }

    /**
     * 帐号字段验证规则
     * @return void
     */
    protected function accountValidateField()
    {
        return $this->username() === 'email' ? 'email' : 'regex:/^1\d{10}$/';
    }

    /**
     * 登录数据
     * @return array
     */
    protected function accounts()
    {
        return [
            $this->username() => request()->account,
            'password' => request()->input('password')
        ];
    }
}
