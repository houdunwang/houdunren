<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\EduTag;

/**
 * 标签管理
 * Class EduTagRepository
 * @package App\Repositories
 */
class EduTagRepository extends Repository implements RepositoryInterface
{
    protected $name = EduTag::class;

    /**
     * 课程列表
     * @param EduTag $tag
     * @param int $row
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function lessons(EduTag $tag, $row = 12)
    {
        return $tag->lessons()->paginate($row);
    }
}