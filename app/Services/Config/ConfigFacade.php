<?php

namespace App\Services\Config;

use Illuminate\Support\Facades\Facade;

class ConfigFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ConfigService';
    }
}
