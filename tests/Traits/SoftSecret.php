<?php

namespace Tests\Traits;

trait SoftSecret
{
    protected function getSoftSecret()
    {
        return user()->softSecret;
    }
}
