<?php

namespace App\Models\Traits;

use Spatie\Activitylog\Traits\LogsActivity;
use Spatie\Activitylog\Contracts\Activity as SpatieActivity;

trait Activity
{
    use LogsActivity;

    public function tapActivity(SpatieActivity $activity, string $eventName)
    {
        $activity->site_id = site()['id'];
        $activity->module_id = module()['id'];
    }
}
