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

/**
 * 课程
 * Class EduLessonRepository
 * @package App\Repositories
 */
class EduLessonRepository  extends Repository implements RepositoryInterface
{
    protected $name = EduLesson::class;

    public function paginate($row = 10, array $columns = ['*'])
    {
        return EduLesson::with('user')->latest()->where('video_num', '>', 0)->paginate($row);
    }
}