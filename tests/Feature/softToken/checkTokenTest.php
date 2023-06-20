<?php

namespace Tests\Feature\softToken;

use App\Services\SubscribeService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Tests\Traits\SoftSecret;
use Tests\Traits\SoftToken;

class checkTokenTest extends TestCase
{
    use SoftSecret, SoftToken;

    protected function setUp(): void
    {
        parent::setUp();
        $this->login();
    }

    /**
     * 密钥过期时
     * @test
     */
    public function secretExpires()
    {
        user()->softSecret()->update(['end_time' => now()->subYear(1)]);
        $response = $this->postJson('/api/softToken/checkToken', [
            "secret" => user()->softSecret->secret,
            "app" => 'camera',
            "token" => 'abc'
        ]);
        $response->assertInvalid(['secret']);
    }

    /**
     * token无效时
     * @test
     */
    public function whenTheTokenIsInvalid(): void
    {
        $response = $this->postJson('/api/softToken/checkToken', [
            "app" => 'camera',
            "token" => 'abc'
        ]);
        $response->assertInvalid(['token']);
    }

    /**
     * 软件不存在时
     * @test
     */
    public function softwareDoesntExist()
    {
        $response = $this->postJson('/api/softToken/checkToken', [
            "app" => 'abc',
            "token" => 'abc'
        ]);
        $response->assertInvalid(['app']);
    }
}
