<?php

namespace Tests\Feature\softToken;

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
     * 令牌验证通过
     * @test
     */
    public function tokenAuthentication()
    {
        $response = $this->postJson('/api/softToken/getToken', [
            'secret' => user()->softSecret->secret,
            "app" => 'camera'
        ]);
        $response = $this->postJson('/api/softToken/checkToken', [
            "token" => $response['token']
        ]);
        $response->assertOk();
    }

    /**
     * 密钥过期时
     * @test
     */
    public function secretExpires()
    {
        user()->softSecret()->update(['end_time' => now()->subYears(10)]);
        $response = $this->postJson('/api/softToken/checkToken', [
            "token" => 'abc'
        ]);
        $response->assertInvalid(['token']);
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
}
