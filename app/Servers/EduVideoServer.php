<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-07
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;


use App\Models\EduVideo;

/**
 * 课程视频
 * Class EduVideoServer
 * @package App\Servers
 */
class EduVideoServer
{
    /**
     * 视频学习记录
     * @param EduVideo $video
     * @return array
     */
    public function log(EduVideo $video)
    {
        return $video->userVideo()->withTimestamps()->sync([auth()->id()]);
    }
}