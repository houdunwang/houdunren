<?php

namespace App\Services\Pay;

use Illuminate\Support\Facades\Facade;

class PayFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'PayService';
    }
}
