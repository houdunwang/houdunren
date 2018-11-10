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

use App\Models\EduLesson;

class EduLessonRepository implements RepositoryInterface
{
    use Repository;

    public function all(array $columns = ['*'])
    {

    }

    public function paginate($row = 10, array $columns = ['*'])
    {
        return EduLesson::with('user')->latest()->where('video_num', '>', 0)->paginate($row);
    }

    public function create($attributes)
    {
        // TODO: Implement create() method.
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