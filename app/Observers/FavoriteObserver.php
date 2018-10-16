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
        $favorite->belongModel()->increment('favorite_num');
    }

    public function deleted(Favorite $favorite)
    {
        $favorite->belongModel()->decrement('favorite_num');
    }

    /**
     * Handle the favorite "restored" event.
     *
     * @param  \App\Models\Favorite $favorite
     * @return void
     */
    public function restored(Favorite $favorite)
    {
        //
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
