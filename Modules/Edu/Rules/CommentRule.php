<?php

namespace Modules\Edu\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;

class CommentRule implements Rule
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
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $user = Auth::user();
        $name = "comment-send-{$user['id']}";
        $sendTime = cache($name, now()->subHour(1));
        $state = $sendTime->addSecond(20) < now();
        if ($state) {
            cache([$name => now()]);
        }
        if (!$state) {
            abort(403, '休息一会，请稍候发送');
        }
        return $state;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '请稍候发送';
    }
}
