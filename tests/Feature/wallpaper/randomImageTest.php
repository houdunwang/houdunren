<?php

namespace Tests\Feature\wallpaper;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class randomImageTest extends TestCase
{
    /**
     * 获取随机壁纸
     * @test
     */
    public function AccessToRandomWallpaper(): void
    {
        $response = $this->postJson('/api/wallpaper/random', [
            "name" => "ales-krivec-MbwSUM8dtGA.jpg"
        ]);
        $response->assertJson(["big" => true, 'small' => true]);
    }
}
