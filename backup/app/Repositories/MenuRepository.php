<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2019-03-01
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\Menu;

/**
 * 菜单管理
 * Class MenuRepository
 * @package App\Repositories
 */
class MenuRepository extends Repository
{
    protected $model = Menu::class;
}