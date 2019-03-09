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
 * 站点
 * Trait Site
 * @package App\Traits
 */
trait Site
{
    public function scopeSite($query)
    {
        return $query->where('site_id', \site()['id']);
    }
}