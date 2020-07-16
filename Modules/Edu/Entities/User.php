<?php

namespace Modules\Edu\Entities;

use App\Models\User as ModelsUser;
use Illuminate\Database\Eloquent\Model;

class User extends ModelsUser
{
  public static function make(int $id = null)
  {
    return self::find($id ?? auth()->id());
  }

  public function orders()
  {
    return $this->hasMany(Order::class);
  }

  public function topics()
  {
    return $this->hasMany(Topic::class);
  }
}
