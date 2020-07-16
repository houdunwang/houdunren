<?php

namespace Modules\Edu\Entities;

use App\Models\Traits\Favorite;
use App\Models\Traits\Favour;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;

class Topic extends Model
{
  use Favorite, Favour, LogsActivity;

  protected $table = 'edu_topic';

  protected $fillable = ['title', 'content'];

  protected static $recordEvents = ['created'];

  protected $casts = [
    'recommend' => 'boolean',
  ];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function tags()
  {
    return $this->morphToMany(Tag::class, 'relation', 'edu_tag_relation');
  }

  public function scopeSearch($query, $w)
  {
    if (empty($w)) {
      return $query;
    }

    return $query->where('title', 'like', "%{$w}%");
  }
}
