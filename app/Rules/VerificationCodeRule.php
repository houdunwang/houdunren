<?php

namespace App\Rules;

use App\Services\CodeService;
use Illuminate\Contracts\Validation\Rule;

class VerificationCodeRule implements Rule
{
    protected $mobile;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($account)
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
        return app(CodeService::class)->check($this->account, $value);
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
