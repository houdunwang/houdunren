<?php

namespace App\Services;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Spatie\Activitylog\Models\Activity;

/**
 * 模块动态
 * @package App\Services
 */
class ActivityService
{
    /**
     * 记录动态
     * @param mixed $name
     * @param Model $model
     * @param array $properties
     * @return void
     */
    public function save($name, $description, Model $model, $properties = [])
    {
        activity()
            ->causedBy(Auth::user())
            ->performedOn($model)
            ->withProperties($properties)
            ->tap(function (Activity $activity) use ($name) {
                $activity->log_name = $name;
                $activity->site_id = SITEID;
                $activity->module_id = module()['id'];
            })
            ->log($description);
    }
}
