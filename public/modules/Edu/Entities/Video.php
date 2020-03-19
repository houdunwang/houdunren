<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * 课程视频
 * Class Video
 */
class Video extends Model
{
  protected $table = "edu_videos";
  protected $fillable = ['site_id', 'title', 'path', 'external_address', 'favour_count'];

  public function lesson()
  {
    return $this->belongsTo(Lesson::class, 'lesson_id');
  }

  /**
   * 点赞
   * @return MorphToMany
   */
  public function favour()
  {
    return $this->morphToMany(User::class, 'favour', 'edu_favour');
  }

  /**
   * 收藏
   * @return void
   */
  public function favorite()
  {
    return $this->morphToMany(User::class, 'favorite', 'edu_favorite');
  }
}
