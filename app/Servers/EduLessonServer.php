<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-07
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\Models\EduLesson;

/**
 * 课程服务
 * Class EduLessonServer
 * @package App\Servers
 */
class EduLessonServer
{
    /**
     * 记录会员学习动态
     * @param EduLesson $lesson
     * @return array
     */
    public function log(EduLesson $lesson)
    {
        return $lesson->userLesson()->withTimestamps()->sync([auth()->id()]);
    }
}