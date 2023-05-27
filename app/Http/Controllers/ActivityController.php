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
        return ActivityResource::collection(Activity::latest('id')->paginate(15));
    }
}
