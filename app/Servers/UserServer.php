<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018-12-07
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Servers;

use App\User;

/**
 * 用户服务
 * Class UserServer
 * @package App\Servers
 */
class UserServer
{
    /**
     * 粉丝关注
     * @param User $user
     */
    public function follower(User $user)
    {
        $followers = auth()->user()->follower()->toggle([$user['id']]);
        if (in_array($user['id'], $followers['attached'])) {
            //关注时记录全站动态
            activity()
                ->performedOn($user)
                ->causedBy(auth()->user())
                ->log('follower');
        } else {
            //取关时删除动态
            $user->activity()->where('causer_id', auth()->id())->delete();
        }
    }
}