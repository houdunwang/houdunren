<?php

namespace Tests\Feature\soft;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CheckSoftUpdateTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    /**
     * 有新版本更新
     * @test
     */
    public function withTheNewVersionUpdate()
    {
        $response = $this->postJson('/api/soft/checkUpdate', [
            "app" => 'camera',
            "version" => '1.0.0'
        ]);

        $response->assertJson(['code' => 1]);
    }

    /**
     * 没有更新时
     * @test
     */
    public function notUpdate()
    {
        $response = $this->postJson('/api/soft/checkUpdate', [
            "app" => 'camera',
            "version" => '1.0.1'
        ]);

        $response->assertJson(['code' => 0]);
    }

    /**
     * 软件不存在
     * @test
     */
    public function softwareDoesNotExist()
    {
        $response = $this->postJson('/api/soft/checkUpdate', [
            "app" => '@@',
            "version" => '1.0.1'
        ]);

        $response->assertInvalid(['app']);
    }
}
