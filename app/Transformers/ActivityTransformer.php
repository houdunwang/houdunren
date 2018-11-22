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
        return $collection->map(function ($activity) {
            if ($activity->subject && $activity->causer) {
                return $this->item($activity)??null;
            }
        })->filter();
    }

    /**
     * 单条动态
     * @param $activity
     * @return mixed
     */
    public function item($activity)
    {
        $link = $activity->subject->link();
        $title = $activity->subject->title();
        if ($link && $title) {
            $activity['link'] = $link;
            $activity['title'] = $title;
            switch ($activity->log_name) {
                case 'comment':
                    $activity['active'] = '发表评论';
                    break;
                case 'edu_zan':
                    $activity['active'] = '赞了';
                    break;
                case 'edu_topic':
                    $activity['active'] = $activity['description'] == 'created' ? '发布话题' : '更新话题';
                    break;
            }
            return $activity;
        }
    }
}