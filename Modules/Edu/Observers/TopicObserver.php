<?php

namespace Modules\Edu\Observers;

use Modules\Edu\Entities\Topic;
use Log;

class TopicObserver
{
    public function created(Topic $topic)
    {
    }

    public function updated(Topic $topic)
    {
        //
    }


    public function deleted(Topic $topic)
    {
        $topic->comments()->delete();
    }

    /**
     * Handle the Topic "restored" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function restored(Topic $topic)
    {
        //
    }

    /**
     * Handle the Topic "force deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function forceDeleted(Topic $topic)
    {
        //
    }
}
