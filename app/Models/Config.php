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

use App\Observers\ConfigObserver;
use Illuminate\Database\Eloquent\Model;

class Config extends Model
{
    protected $fillable = ['name', 'data', 'module'];

    protected $casts = ['data' => 'array'];

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }

    protected static function boot()
    {
        Config::observe(ConfigObserver::class);
        parent::boot();
    }
}
