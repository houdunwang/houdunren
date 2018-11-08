<?php

namespace App\Observers;

use App\Models\EduTopic;

class EduTopicObserver
{
    public function created(EduTopic $eduTopic)
    {
    }

    public function updated(EduTopic $eduTopic)
    {
    }

    public function deleted(EduTopic $eduTopic)
    {
        $eduTopic->activity()->delete();
    }

    public function restored(EduTopic $eduTopic)
    {
    }

    public function forceDeleted(EduTopic $eduTopic)
    {
    }
}
