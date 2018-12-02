<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/14
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\User;
use Spatie\Permission\Models\Role;

class UserRepository extends Repository implements RepositoryInterface
{
    protected $name = User::class;

    /**
     * 搜索会员
     * @param $w
     * @param int $row
     * @return mixed
     */
    public function member($w, $row = 20)
    {
        $users = $this->model->paginate($row);
        if ($w) {
            $users = $this->model->orWhere('email', 'like', "%$w%")->orWhere('mobile', 'like', "%$w%")
                ->orWhere('name', 'like', "%$w%")->paginate($row);
        }
        return $users;
    }

    public function admin()
    {
        $roles = Role::where('admin', 1)->pluck('name');
        return User::role($roles)->where('id', '<>', 1)->get();
    }
}