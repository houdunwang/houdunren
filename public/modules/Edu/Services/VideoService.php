<?php

namespace Modules\Edu\Services;

use App\Services\UserService;
use App\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use Modules\Edu\Entities\Video;

class VideoService
{
    /**
     * 视频观看权限检测
     * @param Video $video
     * @param User $user
     * @return bool|mixed
     * @throws BindingResolutionException
     */
    public function playCheck(Video $video, User $user)
    {
        $lesson = $video->lesson;
        if ($lesson['price'] > 0) {
            //满足费观看数量
            if ($video['rank'] <= $lesson['free_num']) {
                return true;
            }
            //会员订阅检测
            $duration = app(DurationService::class)->expireCheck($user);
            if ($duration) {
                return true;
            }
            //站点管理员检测
            $access = app(UserService::class)->isRole(site(), $user);
            if ($access) {
                return true;
            }
        }
        return $lesson['price'] == 0;
    }
}
