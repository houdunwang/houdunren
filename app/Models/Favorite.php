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

use App\Foundations\CommonRelation;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 收藏内容
 * Class Favorite
 * @package App\Models
 */
class Favorite extends Model
{
    use CommonRelation, LogsActivity, SoftDeletes;
    //软删除
    protected $dates = ['deleted_at'];

    //全站动态
    protected static $logName = 'favorite';
    public $activity = ['action' => '收藏了'];

    protected $fillable = ['user_id', 'favorite_num','title','url'];

    public function belongModel()
    {
        return $this->morphTo('favorite');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    //赞标题
    public function title()
    {
        return $this['title'];
    }

    //链接
    public function link()
    {
        return $this['url'];
    }
}
