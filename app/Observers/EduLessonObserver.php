<?php

namespace App\Observers;

use App\Models\EduLesson;

class EduLessonObserver
{
    public function created(EduLesson $lesson)
    {
    }

    /**
     * Handle the edu lesson "updated" event.
     *
     * @param  \App\Models\EduLesson $lesson
     * @return void
     */
    public function updated(EduLesson $lesson)
    {
    }

    /**
     * Handle the edu lesson "deleted" event.
     *
     * @param  \App\Models\EduLesson $lesson
     * @return void
     */
    public function deleted(EduLesson $lesson)
    {
        //
    }

    /**
     * Handle the edu lesson "restored" event.
     *
     * @param  \App\Models\EduLesson $lesson
     * @return void
     */
    public function restored(EduLesson $lesson)
    {
        //
    }

    /**
     * Handle the edu lesson "force deleted" event.
     *
     * @param  \App\Models\EduLesson $lesson
     * @return void
     */
    public function forceDeleted(EduLesson $lesson)
    {
        //
    }
}
