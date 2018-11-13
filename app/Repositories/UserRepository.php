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

    public function paginate($row = 10, array $columns = ['*'])
    {
        $this->model = $this->model->with('roles');
        return parent::paginate($row, $columns);
    }

}