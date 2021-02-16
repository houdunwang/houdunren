<?php

namespace Modules\Edu\Observers;

use Modules\Edu\Entities\Topic;

class TopicObserver
{
    /**
     * Handle the Topic "created" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function created(Topic $topic)
    {
    }

    /**
     * Handle the Topic "updated" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function updated(Topic $topic)
    {
        //
    }

    /**
     * Handle the Topic "deleted" event.
     *
     * @param  \App\Models\Topic  $topic
     * @return void
     */
    public function deleted(Topic $topic)
    {
        //
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
