<?php

namespace Modules\Edu\Entities;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Spatie\Activitylog\Traits\LogsActivity;
class Sign extends Model
{
  use LogsActivity;
  protected static $recordEvents = ['created'];

  protected $table = 'edu_sign';

  protected $fillable = ['content', 'mood'];

  public function user()
  {
    return $this->belongsTo(User::class);
  }
}
