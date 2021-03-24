<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * 帐号验证规则
 * @package App\Rules
 */
class AccountRule implements Rule
{
    public function passes($attribute, $value)
    {
        return preg_match('/^(.+@.+|\d{11})$/i', $value);
    }

    public function message()
    {
        return '帐号格式错误';
    }
}
