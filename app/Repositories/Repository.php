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

trait Repository
{
    protected $model;

    /**
     * 根据属性或当前类生成模型对象
     * @return \Illuminate\Foundation\Application|mixed
     */
    public function makeModel()
    {
        if (empty($this->model)) {
            return app('App\Models\\' . substr(__CLASS__, 17, -10));
        }
        return app($this->model);
    }

    public function all(array $columns = ['*'])
    {
        return $this->makeModel()->all($columns);
    }

    public function paginate($row = 10, array $columns = ['*'])
    {
        return $this->makeModel()->paginate($row, $columns);
    }

    public function create($attributes)
    {
        return call_user_func_array([$this->model(), 'create'], $attributes);
    }

    public function update($attributes)
    {
        return call_user_func_array([$this->model(), 'update'], $attributes);
    }

    public function delete($model)
    {
        return $model->delete();
    }

    public function find($id, $columns = ['*'])
    {
        return $this->makeModel()->find($id, $columns);
    }

    public function findBy($field, $value, $columns = ['*'])
    {
        return $this->makeModel()->where($field, $value)->first($columns);
    }
}