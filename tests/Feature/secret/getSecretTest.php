<?php

namespace Tests\Feature\secret;

use App\Services\SubscribeService;
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

    /**
     * 未订阅用户不能获取密钥
     * @test
     */
    public function notSubscribersCantGetTheSecret()
    {
        user()->subscribe()->delete();
        $response = $this->getJson('/api/softSecret');
        $response->assertStatus(403);
    }

    /**
     * 密钥过期
     * @test
     */
    public function secretExpiration()
    {
        user()->subscribe()->update(['end_time' => now()->subYear(1)]);
        $response = $this->get('/api/softSecret');
        $response->assertStatus(403);
    }
}
