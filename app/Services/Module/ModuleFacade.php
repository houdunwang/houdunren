<?php

namespace App\Services\Module;

use Illuminate\Support\Facades\Facade;

class ModuleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ModuleService';
    }
}
