<?php

namespace App\Http\Controllers;

use App\Http\Resources\ActivityResource;
use App\Models\Activity;
use Illuminate\Http\Request;

//全站动态
class ActivityController extends Controller
{
    public function index()
    {
        $module = request('module');
        return ActivityResource::collection(Activity::where('log_name', $module)->latest('id')->paginate(15));
    }
}
