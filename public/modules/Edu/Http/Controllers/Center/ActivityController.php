<?php

namespace Modules\Edu\Http\Controllers\Center;

use App\Http\Controllers\ApiController;
use App\User;
use Modules\Edu\Transformers\Front\ActivityResource;
use Spatie\Activitylog\Models\Activity;

/**
 * 个人动态
 * @package Modules\Edu\Http\Controllers\Center
 */
class ActivityController extends ApiController
{
    public function index(User $user)
    {
        $activities = Activity::where('causer_id', $user['id'])->latest()->paginate();
        return ActivityResource::collection($activities);
    }
}
