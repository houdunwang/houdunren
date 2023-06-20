<?php

namespace App\Rules;

use App\Models\SoftSecret;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class checkSoftSecret implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $softSecret = SoftSecret::whereSecret($value)->first();
        if (!$softSecret || $softSecret->end_time < now()) {
            $fail('密钥已经过期');
        }
    }
}
