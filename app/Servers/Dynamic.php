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

use Illuminate\Support\Collection;

class Dynamic
{
    /**
     * 格式化网站动态数据
     * @param $activities
     * @return \Illuminate\Support\Collection
     */
    public function format($activities)
    {
        return $activities->map(function ($activity) {
            if ($activity->subject && $activity->causer) {
                $res = [
                    'activity' => $activity,
                    'link' => $activity->subject->link(),
                    'title' => $activity->subject->title(),
                ];
                switch ($activity->log_name) {
                    case 'comment':
                        $res['active'] = '发表评论';
                        break;
                    case 'edu_zan':
                        $res['active'] = '赞了';
                        break;
                    default:
                        $res['active'] = $activity['description'] == 'created' ? '发表了' : '更新了';
                }
                return $res;
            }
        })->filter();
    }
}