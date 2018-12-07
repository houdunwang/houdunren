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
     * 获取系统课程
     * @param EduSystemLesson $systemLesson
     * @return mixed
     */
    public function lesson(EduSystemLesson $systemLesson)
    {
        $lessons = [];
        foreach ((array)explode(',', $systemLesson['lessons']) as $lessonId) {
            $lessons[] = EduLesson::where('id', $lessonId)->first();
        }
        return $lessons;
    }
}