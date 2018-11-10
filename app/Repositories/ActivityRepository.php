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

use Spatie\Activitylog\Models\Activity;

/**
 * 网站动态仓库
 * Class ActivityRepository
 * @package App\Repositories
 */
class ActivityRepository implements RepositoryInterface
{
    public function all(array $columns = ['*'])
    {
    }

    public function paginate($row = 10, array $columns = ['*'])
    {
        return Activity::latest('updated_at')->paginate($row);
    }

    public function create($attributes)
    {
    }

    public function update($attributes)
    {
        // TODO: Implement update() method.
    }

    public function delete()
    {
        // TODO: Implement delete() method.
    }

    public function find($id, $columns = ['*'])
    {
        // TODO: Implement find() method.
    }

    public function findBy($field, $value, $columns = ['*'])
    {
        // TODO: Implement findBy() method.
    }

}