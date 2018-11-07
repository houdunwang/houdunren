<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/8
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

//动态
use Spatie\Activitylog\Models\Activity;

class Dynamic
{
    //todo
    public function all($row = 10)
    {
        $activities = Activity::latest('updated_at')->paginate($row);
        $data = collect();
        foreach ($activities as $key => $activity) {
            if ($activity->subject && $activity->causer) {
                switch ($activity->log_name) {
                    case 'comment':
                        $data[] = [
                            'link' => $activity->subject->belongModel->link('#comment-' . $activity->subject->id),
                            'title' => $activity->subject->belongModel->title,
                        ];
                        break;
                    case 'edu_topic':
                        break;
                    case 'edu_lesson':
                        break;
                    case 'edu_zan':
                        break;
                }
            }
        }
        return $data;
    }
}