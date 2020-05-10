<?php

namespace Modules\Edu\Observers;

use App\Services\ActivityService;
use Modules\Edu\Entities\Topic;

class TopicObserver
{
    public function created(Topic $topic)
    {
        app(ActivityService::class)->save('topic', 'created', $topic, ['title' => $topic['title']]);
    }
}
