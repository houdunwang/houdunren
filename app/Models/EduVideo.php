<?php

namespace App\Models;

use App\Foundations\CommonRelation;
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
    use SoftDeletes, CommonRelation;
    /**
     * 软删除
     * @var array
     */
    protected $dates = ['deleted_at'];

    /**
     * 填充字段
     * @var array
     */
    protected $fillable = ['id', 'title', 'path', 'question', 'lesson_id', 'external_address', 'rank'];

    /**
     * 字段转换
     * @var array
     */
    protected $casts = [
        'question' => 'array',
    ];

    /**
     * 课程关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo(EduLesson::class);
    }

    /**
     * 用户关联
     * @return mixed
     */
    public function user()
    {
        return $this->lesson->user();
    }

    /**
     * 用户视频关联
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function userVideo()
    {
        return $this->belongsToMany(User::class, 'edu_user_videos', 'video_id', 'user_id')->withTimestamps();
    }

//    /**
//     * 视频学习检测
//     * @param User $user
//     * @return bool
//     */
//    public function learned(User $user): bool
//    {
//        static $cache = [];
//        $name = 'log' . $this['id'] . $user['id'];
//        if (!isset($cache[$name])) {
//            $cache[$name] = $this->userVideo()->where('user_id', $user['id'])->pluck('video_id')->toArray();
//        }
//        return (bool)in_array($this['id'], $cache[$name]);
//    }

    /**
     * 视频标题
     * @return string|string[]|null
     */
    public function title()
    {
        return preg_replace('/^\d+\.?\s*/', '', $this->title);
    }

    /**
     * 视频链接
     * @param $param
     * @return string
     */
    public function link($param)
    {
        return route('edu.video.show', $this) . $param;
    }
}
