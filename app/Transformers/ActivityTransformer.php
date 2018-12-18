<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/10
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Transformers;

/**
 * 网站动态
 * Class ActivityTransformer
 * @package App\Transformers
 */
class ActivityTransformer implements TransformInterface
{
    /**
     * 动态列表
     * @param $collection
     * @return mixed
     */
    public function transform($collection)
    {
        return collect($collection)->map(function ($activity) {
            return $this->item($activity);
        })->filter();
    }

    /**
     * 单条动态
     * @param $activity
     * @return mixed
     */
    public function item($activity)
    {
        if ($activity->subject) {
            $action = $activity->description == 'updated' ? $activity->subject->activity['update'] : $activity->subject->activity['create'];
            array_set($activity, 'action', $action);
            return $activity;
        }
    }
}