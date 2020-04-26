<?php

namespace Modules\Edu\Services;

use App\User;
use Modules\Edu\Entities\Subscribe;

/**
 * 会员订阅服务
 * Class SubscribeService
 */
class SubscribeService
{
    public function all()
    {
        return Subscribe::get();
    }
}
