<?php

namespace Modules\Edu\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Activity;

class Sign extends Model
{
  use Activity;

  protected static $recordEvents = ['created'];

  protected $table = 'edu_sign';

  protected $fillable = ['content', 'mood'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function info()
  {
    return $this->hasOne(SignTotal::class, 'user_id', 'user_id');
  }
}
