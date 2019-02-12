<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * 用户原密码验证规则
 * Class UserPasswordRule
 * @package App\Rules
 */
class UserPasswordRule implements Rule
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
     * @param  string $attribute
     * @param  mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return \Hash::check($value, auth()->user()->makeVisible('password')['password']);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '原密码输入错误';
    }
}
