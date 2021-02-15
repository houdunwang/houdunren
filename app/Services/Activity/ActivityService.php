<?php

namespace App\Services\Activity;

use Spatie\Activitylog\Contracts\Activity as Ac;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Models\Activity;
use App\Models\User;
use Illuminate\Contracts\Container\BindingResolutionException;
use InvalidArgumentException;
use Spatie\Activitylog\Exceptions\CouldNotLogActivity;
use Illuminate\Database\Eloquent\InvalidCastException;
use Illuminate\Database\Eloquent\JsonEncodingException;

/**
 * 用户活动
 * @package App\Services
 */
class ActivityService
{
    /**
     * 记录活动
     * @param User $user
     * @param Model $model
     * @param string $description
     * @param array $properties
     * @return void|Ac
     * @throws BindingResolutionException
     * @throws InvalidArgumentException
     * @throws CouldNotLogActivity
     * @throws InvalidCastException
     * @throws JsonEncodingException
     */
    public function log(User $user, Model $model, string $description = '', array $properties)
    {
        return activity()
            ->causedBy($user)
            ->performedOn($model)
            ->withProperties($properties)
            ->tap(function (Ac $activity) {
                $activity->site_id = SID;
                $activity->model_id = MID;
            })
            ->log($description);
    }

    /**
     * 获取用户动态
     * @param User $user
     * @return mixed
     */
    public function user(User $user)
    {
        return Activity::where('site_id', SID)->where('module_id', MID)->get();
    }
}
