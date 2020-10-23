<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Activity;
use App\Models\User;
use Carbon\Carbon;
use Carbon\Exceptions\InvalidFormatException;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * 评论模型
 * @package Modules\Edu\Entities
 */
class Comment extends Model
{
  use Activity;

  protected $table = 'edu_comment';

  protected $fillable = ['content', 'user_id', 'site_id', 'reply_user_id'];

  protected static $recordEvents = ['created'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  /**
   * 回复用户
   * @return BelongsTo
   */
  public function reply_user()
  {
    return $this->belongsTo(User::class, 'reply_user_id');
  }

  /**
   * 获取HTML内容
   * @return mixed
   * @throws InvalidFormatException
   */
  public function getHtmlAttribute()
  {
    if ($this->updated_at < Carbon::create(2020, 6, 1)) {
      return $this->content;
    }

    return (new \Parsedown())->setSafeMode(true)->text($this->content);
  }

  /**
   * 多态关联
   * @return MorphTo
   */
  public function commentable()
  {
    return $this->morphTo('comment');
  }

  /**
   * 评论链接
   * @return string
   */
  public function link()
  {
    return $this->commentable->link() . '#comment-' . $this->id;
  }
}
