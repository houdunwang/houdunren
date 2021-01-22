<?php

namespace App\Rules;

use CodeService;
use Illuminate\Contracts\Validation\Rule;

/**
 * 表单验证码校验
 *
 * @package App\Rules
 */
class CodeRule implements Rule
{
    protected $account;

    public function __construct($account)
    {
        $this->account = $account;
    }

    public function passes($attribute, $value)
    {
        return CodeService::check($this->account, $value);
    }

    public function message()
    {
        return '验证码输入错误';
    }
}
