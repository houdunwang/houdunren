<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/10
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Exceptions\CustomException;
use Illuminate\Database\Eloquent\Model;

/**
 * 仓库抽像类
 * Class Repository
 * @package App\Repositories
 */
abstract class Repository implements RepositoryInterface
{
    //模型类
    protected $model;
    //模型实例
    protected $instance;

    public function __construct()
    {
        if (!class_exists($this->model)) {
            throw new CustomException('模型文件不存在');
        }
        $this->instance = app($this->model);
    }

    public function all(array $columns = ['*'])
    {
        return $this->instance->get($columns);
    }

    public function paginate($row = 10, array $columns = ['*'], $latest = null)
    {
        return $this->instance->latest($latest)->paginate($row, $columns);
    }

    public function create(array $attributes)
    {
        return $this->instance->create($attributes);
    }

    public function update(Model $model, array $attributes)
    {
        return $model->fill($attributes)->save();
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->instance->find($id, $columns);
    }

    public function findByAttributes(array $attributes, $columns = ['*'])
    {
        return $this->instance->where($attributes)->first($columns);
    }
}