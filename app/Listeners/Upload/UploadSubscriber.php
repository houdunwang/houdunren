<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com
 * |      Date: 2018/6/28 下午8:07
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace App\Listeners\Upload;

use App\Events\UploadEvent;

class UploadSubscriber
{
    public function subscribe($events)
    {
        $events->listen(UploadEvent::class, FileListener::class);
        $events->listen(UploadEvent::class, OssListener::class);
    }
}
