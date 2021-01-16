<?php

namespace App\Services\WeChat;

use Illuminate\Support\Facades\Facade;

class WeChatFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'wechat';
    }
}
