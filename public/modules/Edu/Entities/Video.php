<?php

namespace Modules\Edu\Entities;

use App\Scopes\SiteScope;
use App\Traits\Module;
use App\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Modules\Edu\Entities\Comment;

/**
 * 课程视频
 * Class Video
 */
class Video extends Model
{
  use Module;
  protected $table = "edu_videos";
  protected $fillable = ['site_id', 'title', 'path', 'external_address', 'favour_count'];

  /**
   * 课程关联
   * @return BelongsTo
   */
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
   * 收藏检测
   * @param User $user
   * @return bool
   */
  public function isFavour(User $user)
  {
    return (bool) $this->favour()->where('user_id', $user['id'])->first();
  }

  /**
   * 收藏
   * @return void
   */
  public function favorite()
  {
    return $this->morphToMany(User::class, 'favorite', 'edu_favorite');
  }

  /**
   * 收藏检测
   * @param User $User
   * @return void
   */
  public function isFavorite(User $user)
  {
    return (bool) $this->favorite()->where('user_id', $user['id'])->first();
  }

  /**
   * 视频评论
   * 用于获取视频评论列表
   * @return MorphMany
   */
  public function comment()
  {
    return $this->morphMany(Comment::class, 'comment');
  }
}
