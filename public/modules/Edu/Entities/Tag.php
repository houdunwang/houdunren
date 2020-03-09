<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $table = "edu_tag";
  protected $fillable = ['name', 'group', 'site_id'];

  public function lesson()
  {
    return $this->morphedByMany(Lesson::class, 'relation');
  }
}
