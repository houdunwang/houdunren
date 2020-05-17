<?php

namespace Modules\Edu\Observers;

use App\Services\ActivityService;
use Modules\Edu\Entities\Topic;

class TopicObserver
{
    public function created(Topic $topic)
    {
        $content = strip_tags($topic['title']);
        if ($content)
            app(ActivityService::class)->save('topic', 'created', $topic, ['title' => $content]);
    }
}
