<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Traits;

use App\User;
use Spatie\Activitylog\Models\Activity;

/**
 * 站点
 * Trait Site
 * @package App\Traits
 */
trait Site
{
    /**
     * 站点属性
     * @param $query
     * @return mixed
     */
    public function scopeSite($query)
    {
        return $query->where('site_id', \site()['id']);
    }

    /**
     * 用户关联
     * @return mixed
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * 动态附加属性
     * @param Activity $activity
     * @param string $eventName
     */
    public function tapActivity(Activity $activity, string $eventName)
    {
        $activity->site_id = \site()['id'];
        $activity->module_id = \module()['id'];
        $activity->module = \module()['name'];
    }

    /**
     * 点赞关联
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function favour()
    {
        return $this->morphMany(\App\Models\Favour::class, 'favour');
    }

    /**
     * 点赞统计
     * @return mixed
     */
    public function favourCount()
    {
        return $this->favour->count();
    }

    /**
     * 系统会在点赞动作后执行这个方法
     * @return bool
     */
    public function favourUpdate()
    {
        \DB::table($this->getTable())->where('id', $this['id'])->update([
            'favour_num' => $this->favourCount(),
        ]);
    }

    /**
     * 收藏检测
     * @return bool
     */
    public function isFavour(): bool
    {
        return $this->favour()->where('user_id', auth()->id())->first() ? true : false;
    }

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
     * 收藏动作后执行这个方法
     * @return bool
     */
    public function favoriteUpdate()
    {
        \DB::table($this->getTable())->where('id',$this['id'])->update([
            'favorite_num'=> $this->favoriteCount()
        ]);
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