<?php

namespace Tests\Feature\secret;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class checkSoftSecretTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * 验证软件密钥
     * @test
     */
    public function verifyThatTheSoftwareKey()
    {
        $response = $this->postJson('/api/softSecret/checkSoftSecret', [
            'secret' => user()->softSecret->secret
        ]);
        $response->assertOk();
    }

    /**
     * 密钥错误
     * @test
     */
    public function secretError()
    {
        $response = $this->postJson('/api/softSecret/checkSoftSecret', [
            'secret' => 'test'
        ]);
        $response->assertStatus(422);
    }
}
