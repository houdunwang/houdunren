<?php

namespace Modules\Edu\Services;

use Illuminate\Support\Facades\Cache;

class CommentService
{
    /**
     * 评论发布时间检测
     * @return bool
     */
    public function checkTime()
    {
        $cacheTime = Cache::get('comment-send');
        return  !$cacheTime ||  $cacheTime->addSecond(20)  < now();
    }
    /**
     * 记录评论时间
     * @return void
     */
    public function record()
    {
        Cache::put('comment-send', now(), 20);
    }
}
