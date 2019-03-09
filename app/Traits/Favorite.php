<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Traits;

/**
 * 收藏
 * Trait Favorite
 * @package App\Traits
 */
trait Favorite
{
    /**
     * 收藏关联
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favorite()
    {
        return $this->morphMany(\App\Models\Favorite::class, 'favorite');
    }

    /**
     * 收藏统计
     * @return mixed
     */
    public function favoriteCount()
    {
        return $this->favorite->count();
    }

    /**
     * 更新收藏
     * @return bool
     */
    public function favoriteUpdate()
    {
        return true;
    }

    /**
     * 收藏检测
     * @return bool
     */
    public function isFavorite(): bool
    {
        return $this->favorite->where('user_id', auth()->id() ?? 0)->first() ? true : false;
    }
}