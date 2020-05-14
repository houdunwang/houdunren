<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Modules\Edu\Entities\Traits\Common;

/**
 * 课程视频
 * Class Video
 */
class Video extends Model
{
    use Common;
    protected $table = "edu_videos";
    protected $fillable = ['site_id', 'title', 'rank', 'path', 'external_address', 'favour_count'];
    protected static function booted()
    {
        static::addGlobalScope(new SiteScope);
    }
    /**
     * 课程关联
     * @return BelongsTo
     */
    public function lesson()
    {
        return $this->belongsTo(Lesson::class, 'lesson_id');
    }
    /**
     * 用户学习记录
     * @return BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'edu_user_video', 'video_id', 'user_id')->withTimestamps();
    }
}
