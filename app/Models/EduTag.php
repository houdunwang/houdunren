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
 * 标签
 * Class EduTag
 * @package App\Models
 */
class EduTag extends Model
{
    protected $fillable = ['name'];

    protected $casts = [];

    public function lessons()
    {
        return $this->morphedByMany(EduLesson::class, 'relation', 'edu_tag_relations');
    }
}
