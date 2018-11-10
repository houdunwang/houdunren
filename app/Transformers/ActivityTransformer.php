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
    public function transform($collection)
    {
        return $collection->map(function ($activity) {
            if ($activity->subject && $activity->causer) {
                $activity['link'] = $activity->subject->link();
                $activity['title'] = $activity->subject->title();
                switch ($activity->log_name) {
                    case 'comment':
                        $activity['active'] = '发表评论';
                        break;
                    case 'edu_zan':
                        $activity['active'] = '赞了';
                        break;
                    default:
                        $activity['active'] = $activity['description'] == 'created' ? '发表了' : '更新了';
                }
                return $activity;
            }
        })->filter();
    }

    public function item($item)
    {
    }
}