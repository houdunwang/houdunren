<?php

namespace Tests\Feature\wallpaper;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Str;
use Tests\TestCase;

class zipImageTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
        $this->login();
    }
    /**
     * 压缩壁纸图片
     * @test
     */
    public function CompressionWallpaperImages(): void
    {
        $response = $this->getJson('/api/wallpaper/zip');
        $this->assertTrue(Str::endsWith($response[0], 'jpg'));
    }
}
