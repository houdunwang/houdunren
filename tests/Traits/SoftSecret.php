<?php

namespace Tests\Traits;

use App\Services\SoftSecretService;
use App\Services\SubscribeService;

trait SoftSecret
{
    protected function getSoftSecret()
    {
        return user()->softSecret;
        // app(SubscribeService::class)->addSubscribe(user(), 3);
        // return app(SoftSecretService::class)->getSoftSecret(user());
    }
}
