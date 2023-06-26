<?php

namespace Tests\Feature\secret;

use App\Services\SubscribeService;
use Carbon\Carbon;
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
     * 有密钥时刷新密钥值
     * @test
     */
    public function aKeyRefreshKeyValues(): void
    {
        $response = $this->get('/api/softSecret/refresh');
        $response->assertJson(['secret' => true]);
    }

    /**
     * 没有密钥时刷新密钥
     * @test
     */
    public function thereIsNoKeyRefreshKey()
    {
        user()->softSecret()->delete();
        $response = $this->get('/api/softSecret/refresh');
        $response->assertJson(['secret' => true]);
        $this->assertTrue(Carbon::parse($response['created_at'])->year == now()->year);
    }

    /**
     * 没有订阅不能刷新密钥、
     * @test
     */
    public function noSubscriptionCannotRefreshKey()
    {
        user()->subscribe()->delete();
        $response = $this->getJson('/api/softSecret/refresh');
        $response->assertStatus(403);
    }
}
