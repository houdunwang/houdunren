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
class Dynamic
{
    public function all($row = 10, $module = null)
    {
        $module = $module ?? module_name();
        $activitys = Activity::where('log_name', 'like', $module . '%')->latest('updated_at')->paginate($row);

    }
}