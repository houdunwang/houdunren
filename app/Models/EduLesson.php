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
use App\User;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 课程管理
 * Class EduLesson
 * @package App\Models
 */
class EduLesson extends Model
{
    use Common, LogsActivity, Searchable;
    protected static $logName = 'edu_lesson';
    protected $fillable = [
        'title',
        'description',
        'thumb',
        'type',
        'free',
        'subscibe_play',
        'free_num',
        'price',
        'is_commend',
        'is_hot',
        'click',
        'times',
        'status',
        'download_address',
        'user_id',
    ];

    protected $casts = [];

    //配置algolia可搜索属性
    public function toSearchableArray()
    {
        return [
            'title' => $this['title'],
            'description' => $this['description'],
        ];
    }

    public function video()
    {
        return $this->hasMany(EduVideo::class, 'lesson_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function link($param)
    {
        return route('edu.lesson.show', $this) . $param;
    }

    //学习进度
    public function progress(int $user_id): int
    {

    }
}
