<?php
namespace App\Models;

use App\Foundations\CommonRelation;
use App\Observers\EduVideoObserver;
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
    use SoftDeletes, CommonRelation, Searchable;
    /**
     * 需要转换成日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

    protected $fillable = ['id', 'title', 'path', 'question', 'lesson_id'];

    protected $casts = [];

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

    public function title()
    {
        return preg_replace('/^\d+\.?\s*/', '', $this->title);
    }

    public function link($param)
    {
        return route('edu.video.show', $this) . $param;
    }
}
