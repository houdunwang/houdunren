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
use App\Notifications\ZanNotification;
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
        $model = $zan->belongModel()->getModel();
        \DB::table($model->getTable())->update(['zan_num'=>$model['zan_num']+1]);
    }

    public function deleted(Zan $zan)
    {
        //删除动态日志
        $zan->activity()->delete();
        $model = $zan->belongModel()->getModel();
        \DB::table($model->getTable())->update(['zan_num'=>$model['zan_num']-1]);
    }
}
