<?php
/** .-------------------------------------------------------------------
 * |  Software: [hdcms framework]
 * |      Site: www.hdcms.com
 * |-------------------------------------------------------------------
 * |    Author: 向军 <www.aoxiangjun.com>
 * |    WeChat: houdunren2018
 * | Copyright (c) 2012-2019, www.houdunren.com. All Rights Reserved.
 * '-------------------------------------------------------------------*/

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 会员关注
 * Class Follower
 * @package App\Models
 */
class Follower extends Model
{
    use LogsActivity;

    protected static $logName = 'follower';

    protected static $recordEvents = ['created', 'updated'];

    protected $fillable = ['user_id', 'follower_id'];

}
