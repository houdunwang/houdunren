<?php

namespace App\Rules;

use App\Models\SoftSecret;
use App\Services\SoftSecretService;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckSoftSecret implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!app(SoftSecretService::class)->checkSoftSecret($value)) {
            $fail('口令无效或已经过期');
        }
    }
}
