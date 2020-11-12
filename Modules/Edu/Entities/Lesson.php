<?php

namespace Modules\Edu\Entities;

use App\Models\BaseModel;
use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Modules\Edu\Entities\Tag;
use Spatie\Activitylog\Traits\LogsActivity;

/**
 * 课程
 * @package Modules\Edu\Entities
 */
class Lesson extends BaseModel
{
  use Favour, Favorite, LogsActivity;

  protected static $recordEvents = ['created'];

  protected $table = 'edu_lessons';

  protected $guarded = [];

  protected $casts = [
    'status' => 'boolean',
  ];

  public function tags()
  {
    return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
  }

  public function videos()
  {
    return $this->hasMany(Video::class)->orderBy('rank', 'asc');
  }

  public function scopeSearch($query, $w = null)
  {
    if (empty($w)) {
      return $query;
    }
    return $query->where('title', 'like', "%{$w}%");
  }

  public function scopeSearchByTag($query, string $tag = null)
  {
    if (empty($tag)) {
      return $query;
    }

    return $this->whereHas('tags', function (Builder $query) use ($tag) {
      $query->where('title', 'like', "$tag%");
    });
  }

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
