<?php

namespace App\Services\Site;

use Illuminate\Support\Facades\Facade;

class SiteFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'SiteService';
    }
}
