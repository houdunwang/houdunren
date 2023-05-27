<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSignCountRequest;
use App\Http\Requests\UpdateSignCountRequest;
use App\Http\Resources\SignCountResource;
use App\Models\SignCount;
use Auth;
use App\Http\Controllers\Controller;

class SignCountController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth:sanctum']);
    }

    /**
     * 当前用户签到信息
     */
    public function mySignCount()
    {
        return new SignCountResource(Auth::user()->hasOne(SignCount::class)->first());
    }
}
