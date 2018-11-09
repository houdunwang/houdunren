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

interface RepositoryInterface
{
    public function all(array $columns = ['*']);

    public function paginate($row = 10, array $columns = ['*']);

    public function create($attributes);

    public function update($attributes);

    public function delete();

    public function find($id, $columns = ['*']);

    public function findBy($field, $value, $columns = ['*']);
}