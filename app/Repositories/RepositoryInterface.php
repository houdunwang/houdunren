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

use Illuminate\Database\Eloquent\Model;

interface RepositoryInterface
{
    public function all(array $columns = ['*']);

    public function paginate($row = 10, array $columns = ['*'], $latest = null);

    public function create(array $attributes);

    public function update(Model $model, array $attributes);

    public function delete(Model $model);

    public function find($id, $columns = ['*']);

    public function findByAttributes(array $attributes, $columns = ['*']);
}