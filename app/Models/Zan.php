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

use App\Models\Traits\Common;
use App\Observers\ZanObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Zan extends Model
{
    use Common, LogsActivity;

    protected static $logAttributes = ['created_at', 'updated_at'];
    protected static $recordEvents = ['created'];
    protected static $logName = 'edu_zan';
    protected $fillable = ['user_id'];

    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
    }

    protected static function boot()
    {
        Zan::observe(ZanObserver::class);
        parent::boot();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function belongModel()
    {
        return $this->morphTo('zan');
    }

    //赞标题
    protected function getTitleAttribute()
    {
        switch (class_basename($this->belongModel)) {
            case 'EduTopic':
                return $this->belongModel->title;
            case 'Comment':
                return $this->belongModel->belongModel->user->name . '的评论';
        }
    }

    //链接
    public function link()
    {
        switch (class_basename($this->belongModel)) {
            case 'EduTopic':
                return $this->belongModel->link();
            case 'Comment':
                $param = '#comment-' . $this->belongModel->id;
                return $this->belongModel->belongModel->link($param);
        }
    }
}
