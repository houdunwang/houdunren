<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Observers;

use App\Models\Zan;
use Spatie\Activitylog\Models\Activity;

/**
 * 点赞事件
 * Class ZanObserver
 * @package App\Observers
 */
class ZanObserver
{
    public function created(Zan $zan)
    {
        $zan->belongModel->increment('zan_num');
    }

    public function deleted(Zan $zan)
    {
        //删除动态日志
        Activity::where('subject_type','App\Models\Zan')->where('subject_id',$zan['id'])->delete();

        $zan->belongModel->decrement('zan_num');
    }
}
