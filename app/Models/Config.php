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

/**
 * 配置管理
 * Class Config
 * @package App\Models
 */
class Config extends Model
{
    protected $fillable = ['name', 'data', 'module','system','site'];

    protected $casts = ['data' => 'array'];

    public function scopeName($query, $name)
    {
        return $query->where('name', $name);
    }
}
