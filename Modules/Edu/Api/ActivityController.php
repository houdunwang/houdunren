<?php

namespace Modules\Edu\Api;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;
use ActivityService;
use Modules\Edu\Transformers\ActivityResource;

/**
 * 用户活动
 * @package Modules\Edu\Http\Controllers\Front
 */
class ActivityController extends Controller
{

    public function index(Request $request)
    {
        $activities = ActivityService::all();
        return ActivityResource::collection($activities);
    }
}
