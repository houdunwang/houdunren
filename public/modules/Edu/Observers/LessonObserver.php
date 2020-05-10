<?php

namespace Modules\Edu\Observers;

use App\Services\ActivityService;
use Modules\Edu\Entities\Lesson;

class LessonObserver
{
    public function created(Lesson $lesson)
    {
        app(ActivityService::class)->save('lesson', 'created', $lesson, ['title' => $lesson['title']]);
    }
}
