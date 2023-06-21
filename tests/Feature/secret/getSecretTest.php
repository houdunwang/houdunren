<?php

namespace Tests\Feature\secret;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class getSecretTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * 获取软件密钥
     * @test
     */
    public function accessToTheSoftwareKey(): void
    {
        $response = $this->get('/api/softSecret');
        $response->assertStatus(200);
    }
}
