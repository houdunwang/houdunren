<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-08
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Presenters;

/**
 * 系统课程
 * Class EduSystemLesson
 * @package App\Presenters
 */
class EduSystemLesson
{
    public function thumb($lesson)
    {
        return empty($lesson['thumb']) ? asset('images/nopic.jpg') : $lesson['thumb'];
    }
}