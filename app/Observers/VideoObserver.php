<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Observers;

use App\Models\EduVideo;

class VideoObserver
{
    public function creating(EduVideo $video)
    {
        $video['user_id'] = auth()->id();
    }

    public function created(EduVideo $video)
    {

    }

    /**
     * Handle the video "updated" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function updated(EduVideo $video)
    {
        //
    }

    /**
     * Handle the video "deleted" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function deleted(EduVideo $video)
    {
        //
    }

    /**
     * Handle the video "restored" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function restored(EduVideo $video)
    {
        //
    }

    /**
     * Handle the video "force deleted" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function forceDeleted(EduVideo $video)
    {
        //
    }
}
