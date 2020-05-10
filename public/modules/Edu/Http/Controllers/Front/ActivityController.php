<?php

namespace Modules\Edu\Http\Controllers\Front;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use Modules\Edu\Transformers\Front\ActivityResource;
use Spatie\Activitylog\Models\Activity;

/**
 * 用户动态
 * @package Modules\Edu\Http\Controllers\Front
 */
class ActivityController extends ApiController
{
    public function index()
    {
        $activities = Activity::latest()->paginate(10);
        return ActivityResource::collection($activities);
    }
}
