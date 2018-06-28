<?php

namespace Tests\Unit;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DoctrineTraitTest extends TestCase
{
    /**
     * 获取字段列表
     *
     * @return void
     */
    public function testListTableColumns()
    {
        $info = User::sm()->getSchemaManager()->listTableColumns('configs');
        $this->assertArrayHasKey('id', $info);
    }
}
