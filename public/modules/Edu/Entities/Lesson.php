<?php

namespace Modules\Edu\Entities;

use App\Traits\Module;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
  use Module;
  protected $table = 'edu_lessons';

  protected $fillable = ['site_id', 'user_id', 'title', 'description', 'thumb', 'type', 'status', 'free_num', 'price', 'is_commend', 'video_num', 'download_address'];

  protected $casts = ['is_commend' => 'boolean', 'status' => 'boolean'];

  public function video()
  {
    return $this->hasMany(Video::class, 'lesson_id');
  }

  public function tag()
  {
    return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
  }
}
