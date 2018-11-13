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

namespace App\Repositories;

use Spatie\Activitylog\Models\Activity;

/**
 * 网站动态仓库
 * Class ActivityRepository
 * @package App\Repositories
 */
class ActivityRepository extends Repository implements RepositoryInterface
{
    protected $name = Activity::class;
}