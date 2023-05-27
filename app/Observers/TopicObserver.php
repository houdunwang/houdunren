<?php

namespace App\Observers;

use App\Models\Topic;

class TopicObserver
{
    public function created(Topic $topic)
    {
        activityLog(
            $topic,
            $topic->title,
            ['model' => 'topic', 'id' => $topic->id]
        );
    }

    public function deleted(Topic $topic)
    {
        $topic->activities()->where('subject_id', $topic->id)->delete();
        $topic->comments()->delete();
    }
}
