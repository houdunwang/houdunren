<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/27
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\EduLesson;
use App\Models\EduSystemLesson;

/**
 * 系统课程
 * Class EduSystemLessonRepository
 * @package App\Repositories
 */
class EduSystemLessonRepository extends Repository implements RepositoryInterface
{
    protected $name = EduSystemLesson::class;

    /**
     * 获取课程
     * @param EduSystemLesson $lesson
     * @return mixed
     */
    public function lesson(EduSystemLesson $lesson)
    {
        return EduLesson::whereIn('id', explode(',',$lesson['lessons']))->get();
    }
}