<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Models;

use App\Observers\FavoriteObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 收藏
 * Class Favorite
 * @package App\Models
 */
class Favorite extends Model
{
    protected $fillable = ['user_id', 'favorite_num'];

    protected static function boot()
    {
        self::observe(FavoriteObserver::class);
        parent::boot();
    }

    public function belongModel()
    {
        return $this->morphTo('favorite');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
