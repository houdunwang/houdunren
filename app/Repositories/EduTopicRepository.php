<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\EduTopic;
use App\User;

/**
 * 贴子管理
 * Class EduTopicRepository
 * @package App\Repositories
 */
class EduTopicRepository extends Repository implements RepositoryInterface
{
    protected $name = EduTopic::class;

    /**
     * 根据用户获取贴子列表
     * @param User $user
     * @param int $row
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function paginateByUser(User $user, $row = 10)
    {
        return EduTopic::with('category')->where('user_id', $user['id'])->latest('id')->paginate($row);
    }

    public function recommendLists($row = 5)
    {
        return EduTopic::limit($row)->where('recommend', true)->get();
    }
}