<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User as UserModel;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class User extends Model
{
  protected $fillable = [];

  protected $hidden = ['remember_token', 'password'];

  public static function instance(UserModel $user)
  {
    return User::find($user['id']);
  }

  /**
   * 视频点赞
   * @return MorphToMany
   */
  public function videoFavour()
  {
    return $this->morphedByMany(Video::class, 'favour', 'edu_favour')->withTimestamps();
  }

  /**
   * 视频收藏
   * @return MorphToMany
   */
  public function videFavorite()
  {
    return $this->morphedByMany(Video::class, 'favorite', 'edu_favorite')->withTimestamps();
  }

  /**
   * 视频评论
   * @return MorphToMany
   */
  public function videoComment()
  {
    return $this->morphedByMany(Video::class, 'comment', 'edu_comment');
  }
}
