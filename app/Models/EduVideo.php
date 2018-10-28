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
use App\Observers\VideoObserver;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Laravel\Scout\Searchable;

/**
 * 课程视频
 * Class EduVideo
 * @package App\Models
 */
class EduVideo extends Model
{
    use SoftDeletes, Common, Searchable;
    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'title', 'path', 'question', 'lesson_id','user_id'];

    protected $casts = [];

    protected static function boot()
    {
        self::observe(VideoObserver::class);
        parent::boot();
    }

    public function lesson()
    {
        return $this->belongsTo(EduLesson::class);
    }

    //用户视频关联
    public function userVideo()
    {
        return $this->belongsToMany(User::class, 'edu_user_videos', 'video_id', 'user_id')->withTimestamps();
    }

    //用户观看视频检测
    public function isLive(int $user_id): bool
    {
        static $cache = [];
        $name = 'log' . $this['id'] . $user_id['id'];
        if (!isset($cache[$name])) {
            $cache[$name] = $this->userVideo()->where('user_id', $user_id)->pluck('video_id')->toArray();
        }
        return in_array($this['id'], $cache[$name]);
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function link($param)
    {
        return route('edu.video.show', $this) . $param;
    }
}
