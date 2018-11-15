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

    protected $data = [];

    protected function setUp()
    {
        parent::setUp();
        \Cache::flush();
        $this->repository = app(ConfigRepository::class);
        $this->data = $this->repository->get('admin');
    }

    public function testSaveParamException()
    {
        $this->expectException(InvalidParamException::class);
        $this->expectExceptionMessage('module does not exists');
        $this->repository->save([],'test');
        $this->fail('fail param check');
    }

    public function testSave()
    {
        $this->data['test'] = 'phpunit';
        $this->assertTrue($this->repository->save($this->data, 'admin'));
    }

    public function testGet()
    {
        $name = $this->repository->get('admin.test');
        return $this->assertSame($name, 'phpunit');
    }

}