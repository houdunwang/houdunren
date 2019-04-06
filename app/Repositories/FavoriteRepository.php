<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Favorite;
use App\User;

/**
 * 收藏
 * Class FavoriteRepository
 * @package App\Repositories
 */
class FavoriteRepository extends Repository
{
    protected $model = Favorite::class;

    /**
     * 收藏列表
     * @param User $user
     * @param int $row
     * @return mixed
     */
    public function lists(User $user, $row = 16, $model = '')
    {
        $this->instance->where('site_id', \site()['id'])->where('user', $user['id']);
        return parent::paginate($row);
    }

}