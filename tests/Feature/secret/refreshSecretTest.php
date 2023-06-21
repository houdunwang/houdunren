<?php

namespace Tests\Feature\secret;

use App\Services\SubscribeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class refreshSecretTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * 刷新生成新密钥
     * @test
     */
    public function generateNewKeyRefresh(): void
    {
        $initResponse = $this->get('/api/softSecret');
        $refreshResponse = $this->get('/api/softSecret/refresh');
        $this->assertFalse($initResponse->json('secret')  == $refreshResponse['secret']);
    }
}
