<?php

namespace Modules\Edu\Entities;

use App\User;
use Illuminate\Database\Eloquent\Model;

/**
 * 贴子
 * @package Modules\Edu\Entities
 */
class Topic extends Model
{
  protected $table = "edu_topic";
  protected $fillable = ['user_id', 'title', 'content', 'user_id'];

  public function user()
  {
    return $this->belongsTo(User::class, 'user_id');
  }
}
