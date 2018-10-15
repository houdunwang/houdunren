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

use Illuminate\Database\Eloquent\Model;

/**
 * 文章分类
 * Class EduCategory
 * @package App\Models
 */
class EduCategory extends Model
{
    protected $fillable = ['title', 'description', 'icon'];
}
