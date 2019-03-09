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
 * 点赞
 * Trait Favour
 * @package App\Traits
 */
trait Favour
{
    /**
     * 点赞关联
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favour()
    {
        return $this->morphMany(\App\Models\Favour::class, 'favour');
    }

    public function favourCount()
    {
        return $this->favour->count();
    }

    public function favourUpdate()
    {
        return true;
    }

    /**
     * 收藏检测
     * @return bool
     */
    public function isFavour(): bool
    {
        return $this->favour()->where('user_id',auth()->id())->first() ? true : false;
    }
}