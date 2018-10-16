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
        $zan->belongModel->decrement('zan_num');
    }
}
