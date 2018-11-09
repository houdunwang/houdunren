<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/10
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Presenters;

use App\User;

/**
 * 处理模型属性
 * Class UserPresenter
 * @package App\Presenters
 */
class UserPresenter
{
    public function avatar(User $user)
    {
        return $user['icon'] ? $user['icon'] : asset('images/user.jpg');
    }
}