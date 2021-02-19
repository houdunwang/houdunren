<?php

namespace Modules\Edu\Observers;

use Modules\Edu\Entities\Video;

class VideoObserver
{
    public function created(Video $video)
    {
    }

    public function updated(Video $video)
    {
        //
    }


    public function deleted(Video $video)
    {
        $video->comments()->delete();
    }

    /**
     * Handle the Video "restored" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function restored(Video $video)
    {
        //
    }

    /**
     * Handle the Video "force deleted" event.
     *
     * @param  \App\Models\Video  $video
     * @return void
     */
    public function forceDeleted(Video $video)
    {
        //
    }
}
