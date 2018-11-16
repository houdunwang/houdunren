<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/14
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\User;

class UserRepository extends Repository implements RepositoryInterface
{
    protected $name = User::class;

    /**
     * 搜索
     * @param $w
     * @param int $row
     * @return mixed
     */
    public function search($w, $row = 10)
    {
        return $this->model->orWhere('email', 'like', "%$w%")->orWhere('mobile', 'like', "%$w%")
            ->orWhere('name', 'like', "%$w%")->paginate($row);
    }
}