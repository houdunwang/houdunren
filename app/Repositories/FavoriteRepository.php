<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\EduLesson;
use App\Models\EduTopic;
use App\Models\Favorite;
use App\User;

/**
 * 收藏管理
 * Class FavoriteRepository
 * @package App\Repositories
 */
class FavoriteRepository extends Repository implements RepositoryInterface
{
    protected $name = Favorite::class;

    public function lessonPaginateList(User $user, $row = 10)
    {
        return Favorite::where('user_id',$user['id'])->where('favorite_type','App\Models\EduLesson')->with('belongModel')->paginate($row);
    }
}