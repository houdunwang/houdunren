<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

/**
 * 系统课程
 * Class System
 */
class System extends Model
{
  protected $table = 'edu_system';
  protected $fillable = ['title', 'description', 'preview', 'site_id', 'user_id'];

  public function lesson()
  {
    return $this->belongsToMany(Lesson::class, 'edu_system_lesson');
  }
}
