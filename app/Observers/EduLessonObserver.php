<?php

namespace App\Observers;

use App\Models\EduLesson;

class EduLessonObserver
{
    public function created(EduLesson $lesson)
    {
    }

    public function updated(EduLesson $lesson)
    {
    }

    public function deleted(EduLesson $lesson)
    {
        $lesson->activity()->delete();
    }

    public function restored(EduLesson $lesson)
    {
    }

    public function forceDeleted(EduLesson $lesson)
    {
    }
}
