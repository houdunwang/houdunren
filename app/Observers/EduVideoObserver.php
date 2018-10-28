<?php

namespace App\Observers;

use App\Models\EduVideo;

class EduVideoObserver
{
    public function created(EduVideo $video)
    {
        $this->changeLessonVideoNum($video);
    }

    public function updated(EduVideo $video)
    {
        $this->changeLessonVideoNum($video);
    }
    //更新课程视频数量
    protected function changeLessonVideoNum(EduVideo $video)
    {
        $lesson = $video->lesson;
        $lesson['video_num'] = $lesson->video()->count();
        $lesson->save();
    }

    public function deleted(EduVideo $video)
    {
    }

    public function restored(EduVideo $video)
    {
    }

    public function forceDeleted(EduVideo $video)
    {
    }
}
