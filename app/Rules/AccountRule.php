<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

/**
 * 帐号验证规则
 */
class AccountRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct(?string $account)
    {
        $this->account = $account;
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
        if (filter_var(request()->account, FILTER_VALIDATE_EMAIL)) {
            return preg_match("/\w+@\w+\.\w+/i", $this->account);
        }
        return preg_match('/^1\d{10}$/', $this->account);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '帐号格式错误';
    }
}
