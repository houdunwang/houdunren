<?php

namespace Modules\Edu\Services;

use App\User;
use Modules\Edu\Entities\Duration;

/**
 * 会员服务
 * @package Modules\Edu\Services
 */
class DurationService
{
    /**
     * 会员订阅过期检测
     * @param User $user
     * @return bool
     */
    public function expireCheck(User $user)
    {
        $duration = Duration::where('user_id', $user['id'])->first();
        return $duration &&  $duration['end_time'] > now();
    }
}
