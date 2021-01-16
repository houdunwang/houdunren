<?php

namespace App\Services\Template;

use Illuminate\Support\Facades\Facade;

class TemplateFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'template';
    }
}
