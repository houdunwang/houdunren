<?php

namespace Modules\Edu\Rules;

use Illuminate\Contracts\Validation\Rule;
use Auth;

/**
 * 评论验证规则
 * @package Modules\Edu\Rules
 */
class CommentRule implements Rule
{
    public function __construct()
    {
    }

    public function passes($attribute, $value)
    {
        return true;
        $name = "comment-send-" . Auth::id();
        $sendTime = cache($name, now()->subHour(1));
        $state = $sendTime->addSecond(20) < now();
        if ($state) {
            cache([$name => now()]);
            return $state;
        } else {
            abort(403, '休息一会，请稍候发送');
        }
    }

    public function message()
    {
        return '请等待20秒后操作';
    }
}
