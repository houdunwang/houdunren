<?php

namespace App\Observers;

use App\Models\Video;

class VideoObserver
{
    public function creating(Video $video)
    {
        $video['user_id'] = auth()->id();
    }

    public function created(Video $video)
    {

    }

    /**
     * Handle the video "updated" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function updated(Video $video)
    {
        //
    }

    /**
     * Handle the video "deleted" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function deleted(Video $video)
    {
        //
    }

    /**
     * Handle the video "restored" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function restored(Video $video)
    {
        //
    }

    /**
     * Handle the video "force deleted" event.
     *
     * @param  \App\Models\Video $video
     * @return void
     */
    public function forceDeleted(Video $video)
    {
        //
    }
}
