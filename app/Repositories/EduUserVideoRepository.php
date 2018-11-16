<?php
/** .-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * |      Date: 2018/11/17
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Repositories;

use App\Models\EduUserVideo;

/**
 * 学习动态
 * Class EduUserVideoRepository
 * @package App\Repositories
 */
class EduUserVideoRepository extends Repository implements RepositoryInterface
{
    protected $name = EduUserVideo::class;
}