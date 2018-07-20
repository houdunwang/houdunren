<?php
/** .-------------------------------------------------------------------
 * |      Site: www.hdcms.com  www.houdunren.com
 * |      Date: 2018/7/19 下午9:12
 * |    Author: 向军大叔 <2300071698@qq.com>
 * '-------------------------------------------------------------------*/

namespace Modules\Article\Services;

use houdunwang\arr\Arr;
use Modules\Article\Entities\Category;

class TagService
{
    public function categoryAll()
    {
        $data = Category::get()->toArray();
        return Arr::channelLevel($data, 0, "&nbsp;", 'id');
        //return Category::get();
    }
}
