<?php

namespace Tests\Traits;

trait SoftToken
{
    public function getSoftToken()
    {
        return user()->softTokens()->whereName('camera')->first();
    }
}
