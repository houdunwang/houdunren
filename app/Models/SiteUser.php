<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军大叔 <www.aoxiangjun.com>
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * 站点用户
 * Class SiteUser
 * @package App\Models
 */
class SiteUser extends Model
{
    protected $table = 'site_user';
    protected $fillable = ['site_id', 'user_id', 'role'];
}