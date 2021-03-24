<?php

namespace App\Services\Code;

use Illuminate\Support\Facades\Facade;

class CodeFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'CodeService';
    }
}
