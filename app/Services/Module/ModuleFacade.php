<?php

namespace App\Services\Module;

use Illuminate\Support\Facades\Facade;

/**
 * 模块Facade
 * @package App\Services\Module
 */
class ModuleFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'ModuleService';
    }
}
