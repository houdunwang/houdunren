<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/14
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace Tests\Feature\Repositories;

use App\Exceptions\InvalidParamException;
use App\Repositories\ConfigRepository;
use Tests\TestCase;

class ConfigRepositoryTest extends TestCase
{
    protected $repository;

    protected $data = [
        'name' => 'beats',
    ];

    protected function setUp()
    {
        parent::setUp();
        $this->repository = app(ConfigRepository::class);
    }

    public function testSaveParamException()
    {
        $this->expectException(InvalidParamException::class);
        $this->expectExceptionMessage('module does not exists');
        $this->repository->save($this->data, 'test');
        $this->fail('fail param check');
    }

    public function testSave()
    {
        $this->assertTrue($this->repository->save($this->data, 'admin'));
    }

    public function testGet()
    {
        $name = $this->repository->get('admin.name');
        return $this->assertSame($name, 'beats');
    }

}