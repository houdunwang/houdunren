<?php

namespace Tests\Feature\softToken;

use App\Services\SubscribeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\SoftSecret;
use Tests\Traits\SoftToken;

class getSoftTokenTest extends TestCase
{
    use SoftSecret, SoftToken;
    protected function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * 获取软件TOKEN
     * @test
     */
    public function AccessToTheSoftwareToken(): void
    {
        $response = $this->postJson('/api/softToken/getToken', [
            'secret' => user()->softSecret->secret,
            "app" => 'camera'
        ]);
        $response->assertStatus(200)->assertJson(['token' => true]);
    }

    /**
     * 密钥过期时不能获取token
     * @test
     */
    public function secretExpireCannotAccessToken()
    {
        user()->softSecret()->update(['end_time' => now()->subYear(1)]);
        $response = $this->postJson('/api/softToken/getToken', [
            'secret' => user()->softSecret->secret,
            "app" => 'camera'
        ]);
        $response->assertInvalid(['secret']);
    }

    /**
     * 不存在密钥时不能获取token
     * @test
     */
    public function whenThereAreNoKeysInCantAccessToken()
    {
        $response = $this->postJson('/api/softToken/getToken', [
            'secret' => '',
            "app" => 'camera'
        ]);
        $response->assertInvalid(['secret']);
    }
}
