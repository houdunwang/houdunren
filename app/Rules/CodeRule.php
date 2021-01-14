<?php

namespace App\Rules;

use App\Services\CodeService;
use Illuminate\Contracts\Validation\Rule;

/**
 * 表单验证码验证规则
 */
class CodeRule implements Rule
{
    public function __construct(?string $account)
    {
        $this->account = $account;
    }

    public function passes($attribute, $value)
    {
        return app(CodeService::class)->check($this->account, $value);
    }

    public function message()
    {
        return '验证码输入错误';
    }
}
