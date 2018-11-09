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

namespace App\Transformers;

use App\User;
use Illuminate\Support\Collection;

/**
 * 模式化会员数据
 * Class UserTransformer
 * @package App\Transformers
 */
class UserTransformer implements TransformInterface
{
    public function transform(Collection $collection)
    {
        return $collection->map(function ($user) {
            return $this->format($user);
        });
    }

    public function item($user)
    {
        return $this->format($user);
    }

    protected function format(User $user)
    {
        return [
            'id' => $user['id'],
            'name' => $user['name'],
            'email' => $user['email'],
            'mobile' => $user['mobile'],
            'avatar' => $user['icon'] ? $user['icon'] : asset('images/user.jpg'),
            'icon' => $user['icon'],
        ];
    }
}