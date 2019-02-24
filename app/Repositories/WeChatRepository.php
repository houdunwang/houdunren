<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-02-23
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\WeChat;

/**
 * 微信公众号
 * Class WeChatRepository
 * @package App\Repositories
 */
class WeChatRepository extends Repository
{
    protected $model = WeChat::class;
}