<?php

namespace Modules\Edu\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User as UserModel;

class User extends Model
{
  protected $fillable = [];

  public static function instance(UserModel $user)
  {
    return User::find($user['id']);
  }
  public function videos()
  {
    return $this->morphedByMany(Video::class, 'favour', 'edu_favour')->withTimestamps();
  }
}
