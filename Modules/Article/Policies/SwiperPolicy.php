<?php

namespace Modules\Article\Policies;

use Illuminate\Auth\Access\HandlesAuthorization;
use Modules\Article\Entities\Swiper;
use App\Models\User;

/**
 * 幻灯片策略
 * @package Modules\Article\Policies
 */
class SwiperPolicy
{
    use HandlesAuthorization;

    public function create(User $user, Swiper $swiper)
    {
        return true;
    }

    public function update(User $user, Swiper $swiper)
    {
        return true;
    }

    public function delete(User $user, Swiper $swiper)
    {
        return true;
    }
}
