<?php

namespace Modules\Edu\Observers;

use Modules\Edu\Entities\Lesson;
use Log;

class LessonObserver
{
    public function created(Lesson $lesson)
    {
    }

    public function updated(Lesson $lesson)
    {
        //
    }


    public function deleted(Lesson $lesson)
    {
    }

    /**
     * Handle the Lesson "restored" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function restored(Lesson $lesson)
    {
        //
    }

    /**
     * Handle the Lesson "force deleted" event.
     *
     * @param  \App\Models\Lesson  $lesson
     * @return void
     */
    public function forceDeleted(Lesson $lesson)
    {
        //
    }
}
