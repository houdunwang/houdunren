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

use App\Models\EduLesson;
use App\Models\Favorite;

/**
 * 收藏事件
 * Class FavoriteObserver
 * @package App\Observers
 */
class FavoriteObserver
{
    public function created(Favorite $favorite)
    {
        $model = $favorite->belongModel()->getModel();
        \DB::table($model->getTable())->update(['favorite_num'=>$model['favorite_num']+1]);
    }

    public function deleted(Favorite $favorite)
    {
        $model = $favorite->belongModel()->getModel();
        \DB::table($model->getTable())->update(['favorite_num'=>$model['favorite_num']-1]);
    }

    /**
     * Handle the favorite "restored" event.
     *
     * @param  \App\Models\Favorite $favorite
     * @return void
     */
    public function restored(Favorite $favorite)
    {

    }

    /**
     * Handle the favorite "force deleted" event.
     *
     * @param  \App\Models\Favorite $favorite
     * @return void
     */
    public function forceDeleted(Favorite $favorite)
    {
        //
    }
}
