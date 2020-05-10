<?php

namespace Modules\Edu\Observers;

use App\Services\ActivityService;
use Modules\Edu\Entities\Video;

class VideoObserver
{
    public function created(Video $video)
    {
    }
}
