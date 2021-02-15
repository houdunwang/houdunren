<?php

namespace App\Services\Activity;

use Illuminate\Support\Facades\Facade;

class ActivityFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ActivityService';
    }
}
