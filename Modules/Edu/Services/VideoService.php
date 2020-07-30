<?php

namespace Modules\Edu\Services;

use Modules\Edu\Entities\User;
use Modules\Edu\Entities\Video;

class VideoService
{
  public function check(Video $video)
  {
    $lesson = $video->lesson;
    if ($lesson->price == 0) {
      return true;
    }

    if ($lesson->free_num >= $video->index) {
      return true;
    }

    if (user()->isSuperAdmin || $video->site->master->id == user('id')) {
      return true;
    }

    $duration = User::make(user('id'))->duration;
    if ($duration && $duration['end_time'] > now()) {
      return true;
    }

    return false;
  }
}
