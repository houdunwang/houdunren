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

use App\Exceptions\InvalidParamException;
use Illuminate\Database\Eloquent\Model;

abstract class Repository
{
    protected $name;

    protected $model;

    public function __construct()
    {
        if (!class_exists($this->name)) {
            throw new InvalidParamException('model does not exists');
        }
        $this->model = app($this->name);
    }

    public function all(array $columns = ['*'])
    {
        return $this->model->get($columns);
    }

    public function paginate($row = 10, array $columns = ['*'])
    {
        return $this->model->latest()->paginate($row, $columns);
    }

    public function create(array $attributes)
    {
        return $this->model->fill($attributes);
    }

    public function update(Model $model, array $attributes)
    {
        return $model->update($attributes);
    }

    public function delete(Model $model)
    {
        return $model->delete();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->model->find($id, $columns);
    }

    public function findBy($field, $value, $columns = ['*'])
    {
        return $this->model->where($field, $value)->first($columns);
    }

    public function where(array $attributes)
    {
        foreach (array_filter($attributes) as $name => $attribute) {
            if (!empty($attribute)) {
                $this->model->where($name, $attribute);
            }
        }
        return $this;
    }

    public function orWhere(array $attributes)
    {
        foreach (array_filter($attributes) as $name => $attribute) {
            if (!empty($attribute)) {
                $this->model = $this->model->orWhere($name, $attribute);
            }
        }
        return $this;
    }
}