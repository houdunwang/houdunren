<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = "edu_tag";
  protected $fillable = ['title', 'site_id'];

  public function lesson()
  {
    return $this->morphedByMany(Lesson::class, 'relation');
  }

  public function group()
  {
    return $this->belongsTo(TagGroup::class, 'edu_tag_group');
  }
}
